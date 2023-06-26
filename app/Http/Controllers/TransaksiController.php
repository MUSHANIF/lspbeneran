<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\validation;
use App\Models\kursi;
use App\Models\cart;
use App\Models\layanan;
use App\Models\jnslayanan;
Use Alert;

use PDF;
use Illuminate\Support\Facades\DB;
use Redirect;
use Carbon\Carbon;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use Illuminate\Http\Request;    
use Auth;
class TransaksiController extends Controller
{
  
    public function keranjang(Request $request , $id)
    {
        $cek =  cart::where('userid', $id)->where('status', 0)->first();
       $cart = layanan::with(['carts', 'layanan'])
       ->join('carts', 'carts.layananid', '=', 'layanans.id')
       ->where('carts.userid',Auth::id()) 
       ->where('carts.status', 0) 
       ->get();
        $hapus = layanan::with(['carts', 'layanan'])
        ->whereRelation('carts', 'userid' ,$id)        
        ->whereRelation('carts', 'status' ,0) 
        
        ->get(); 
        $usertotalharga = cart::where('userid', $id)->sum('harga');
        $usertotaljumlah = cart::where('userid', $id)->where('status',0)->sum('jumlah');
        $datas = validation::where('userid',  auth()->user()->id)->first();
    
        return view('keranjang',compact('datas','cart','cek','hapus','usertotalharga','usertotaljumlah'));
       
    }
    public function berhasil(Request $request , $id)
    {
        $cek =  cart::where('userid', $id)->where('status', 1)->first();
       $cart = cart::with(['cart', 'trans','jns'])       
       ->where('userid',Auth::id()) 
       ->where('status', 1) 
       ->get();
        
        $datas = validation::where('userid',  auth()->user()->id)->first();
    
        return view('berhasil',compact('datas','cart','cek'));
       
    }
    public function tambah(Request $request , $id)
    {
        $data = cart::where('userid',$id)->where('layananid',$request->layananid )->where('status',0)->first();
        if( $data){
            toastr()->error('sudah ada dikeranjang anda!', 'gagal');
            return Redirect::back()->with('error','Sudah ada di keranjang anda');
        }else{
            $layananharga = layanan::where('id',$request->layananid)->first();
            $harga = $layananharga->harga;
            for ($i=0; $i < $request->nomor ; $i++) { 
              
            
            $model = new cart;
            $model->userid = $request->userid;
            $model->jnsid = $request->jnsid;
            $model->layananid = $request->layananid;
            $model->waktu = $request->waktu;
            $model->jumlah = 1;
            $model->biaya = $harga * $request->nomor; //biaya total
            
            $model->harga = $harga ; //harga satuan
            $model->save(); 
        }
        }

      
        $kursi = kursi::where('layananid', $request->layananid )->where('status', 1)->first();
        $datas = kursi::where('layananid', $request->layananid )->update(['stok' => $kursi->stok - $request->nomor]);
        
        
        return redirect()->route('keranjang', Auth::id())->with('success','berhasil di tambahkan di keranjang anda');
       
    }
    public function hapus(Request $request, $id)
    {
    
        $prod = kursi::where('layananid',$request->layananid)->where('status',  1 )->first();
        kursi::where('layananid',$request->layananid)->update([
           'stok' => $prod->stok + $request->nomor,
         
       ]);
        $hapus = cart::find($id);
        $hapus->delete();
       
       
        // toastr()->info('Berhasil di hapus!', 'Sukses');
        return redirect()->route('keranjang', Auth::id())->with('success','barang anda berhasil di hapus');
    }
    public function pembayaran($id)
    {
        $layanan =  cart::with(['user','cart'])->where('userid', $id)->where('status', 0)->get();
        $orang =  cart::where('userid', $id)->where('status', 0)->sum('jumlah');
        
        // $orang = $ORG->jumlah;
        $layanan2 =  cart::with(['user','cart'])
        ->where('userid',Auth::id()) 
        ->where('status', 0)
        ->get();

        $jmlh =  cart::with(['user','cart'])->where('userid', $id)->where('status', 0)->count();
        $total =  layanan::with([
            'carts'])
        ->join('carts', 'carts.layananid', '=', 'layanans.id')
        ->where('carts.userid',Auth::id()) 
        ->where('carts.status', 0) 
        ->sum('carts.harga')   
        ;
       return view('pembayaran',compact('layanan','jmlh','total','layanan2','orang'));
    }
    public function bayar(Request $request,$id){
         $total =   layanan::with([
            'carts'])
        ->join('carts', 'carts.layananid', '=', 'layanans.id')
        ->where('carts.userid',Auth::id()) 
        ->where('carts.status', 0) 
        ->sum('carts.harga')   
        ;
        $data =   layanan::with([
            'carts'])
        ->join('carts', 'carts.layananid', '=', 'layanans.id')
        ->where('carts.userid',Auth::id())
        ->where('carts.status', 0) 
        ;
        $kursi = kursi::where('status', 1)->first();
        $jumlah = $data->sum('carts.harga');
        $stok = $kursi->nomor;
        if($request->total >= $jumlah){
            
            $jumlahyangbelumdibayar =  cart::where('userid', $id)->where('status',0)->sum('jumlah');
            $cart = layanan::with([
                'carts'])
            ->join('carts', 'carts.layananid', '=', 'layanans.id')
            ->where('carts.userid',Auth::id()) 
            ->update(['carts.status' => 1]);
         
            $model = new transaksi;
            $model->userid = $request->userid;
            $model->cartid = $request->cartid;
            $model->waktu = $request->waktu;
            $model->metode_pembayaran = $request->metode_pembayaran;
            $model->bayar = $request->total;
            $model->jumlah = $jumlahyangbelumdibayar;
            $model->total = $total;
            $model->kembalian = $request->total - $jumlah;
            $model->save();
            
            
            
            return redirect()->route('berhasil', Auth::id())->with('success','pembayaran anda berhasil');
        }else{  
        
        return Redirect::back()->with('error','Uang yang anda masukan tidak mencukupi!');
        }
       

    }
   
    public function bukti(Request $request,$id){
        $cart = cart::with(['user','cart','jns'])
        ->where('userid',Auth::id()) 
       ->where('status', 1 )
       ->where('id',$id)
        ->get();
        return view('bukti',compact('cart'));
       
    }
    
}

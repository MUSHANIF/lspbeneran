<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\layanan;
use App\Models\kursi;
use App\Models\jnslayanan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class layananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  layanan::with(['layanan'])->where('name','like',"%".$cari."%")->get();
        return view('admin.layanan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas =  DB::table('jnslayanans')->get();
        return view('admin.layanan.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $model = new layanan;
        
        $model->jnsid = $request->jnsid;
        $model->name = $request->name;
        $model->harga = $request->harga;
        $model->fitur = $request->fitur;
        $model->status = $request->status;
        $model->bahasa = $request->bahasa;
        $model->lokasi = $request->lokasi;
        
        $model->image = $request->image;        
        $model->deskripsi = $request->deskripsi;
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/layanan';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }


        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
           
            'harga' => 'required|max:15',
            
            'jnsid' => 'required',                                
            'lokasi' => 'required|max:15',
            
            'bahasa' => 'required',                                
            
            'deskripsi' => 'required|max:400',

        ]);
        if ($validasi->fails()) {
            return redirect()->route('layanan.create')->withInput()->withErrors($validasi);
        }
       
        $model->save();
       
        
        
        return redirect('/layanan')->with('success','data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = layanan::find($id);
        $data =  jnslayanan::all();
        return view('admin.layanan.ubah',compact('datas','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $data = $request->all();
        $model = layanan::findOrFail($id);
      
        $model->jnsid = $request->jnsid;
        $model->name = $request->name;
        $model->harga = $request->harga;
           
             
        $model->deskripsi = $request->deskripsi;
       


        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
           
            'harga' => 'required|max:15',
            
            'jnsid' => 'required',                                
            
            'deskripsi' => 'required|max:400',

        ]);
        if ($validasi->fails()) {
            return redirect()->route('layanan.edit' ,$id)->withInput()->withErrors($validasi);
        }
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/layanan';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }
        $model->save();

        
    return redirect('/layanan')->with('success','data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = layanan::find($id);
        $hapus->delete();
        
        return redirect('layanan')->with('success','data berhasil di hapus');
    }
}

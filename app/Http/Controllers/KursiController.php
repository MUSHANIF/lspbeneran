<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\kursi;
use App\Models\layanan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class kursiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  kursi::with(['kur'])
        ->whereRelation('kur', 'name' ,'like',"%".$cari."%")
        ->get();
        $data =  kursi::with(['kur'])->get();
        return view('admin.kursi.index', compact('datas','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas =  DB::table('layanans')->get();
        return view('admin.kursi.create', compact('datas'));
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
        
        $model = new kursi;
      if ($request->stok) {
     
        $model->layananid = $request->layananid;
        $model->status = $request->status;
        $model->stok = $request->stok;

      }
        $validasi = Validator::make($data, [
            'layananid' => 'required|max:191|unique:kursis',
        ]);
        if ($validasi->fails()) {
            return redirect()->route('kursi.create')->withInput()->withErrors($validasi);
        }
       
        $model->save();

        
        return redirect('/kursi')->with('success','data berhasil di simpan');
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
        $datas =  kursi::findOrFail($id);
        $data = layanan::all();
        return view('admin.kursi.ubah',compact('datas','data'));
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
        $model = kursi::findOrFail($id);
        $data = $request->all();
    
      
        
        $model->layananid = $request->layananid;
        $model->status = $request->status;
        $model->stok = $request->stok;
       

        $validasi = Validator::make($data, [
            
            'stok' => 'required|max:191|',
        ]);
        if ($validasi->fails()) {
            return redirect()->route('kursi.edit', $id)->withInput()->withErrors($validasi);
        }
       
        $model->save();

        // toastr()->success('Berhasil di ubah!', 'Sukses');
        return redirect('/kursi')->with('success','berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = kursi::find($id);
        $hapus->delete();
        // toastr()->info('Berhasil di hapus!', 'Sukses');
        return redirect('kursi')->with('success','berhasil di hapus');
    }
}

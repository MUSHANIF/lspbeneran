<?php

namespace App\Http\Controllers;

use App\Models\jnslayanan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\StorejnslayananRequest;
use App\Http\Requests\UpdatejnslayananRequest;

class JnslayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  jnslayanan::where('name','like',"%".$cari."%")->get();
        return view('admin.jnslayanan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas =  DB::table('jnslayanans')->get();
        return view('admin.jnslayanan.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorejnslayananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $model = new jnslayanan;
        $model->image = $request->image;
        $model->name = $request->name;
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/jnslayanan';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }
        $validasi = Validator::make($data, [
            'name' => 'required|max:191|unique:jnslayanans',
        ]);
        if ($validasi->fails()) {
            return redirect()->route('jns.create')->withInput()->withErrors($validasi);
        }
       
        $model->save();

        // toastr()->success('Berhasil di buat!', 'Sukses');
        return redirect('/jns')->with('success','berhasil di tambahkan ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jnslayanan  $jnslayanan
     * @return \Illuminate\Http\Response
     */
    public function show(jnslayanan $jnslayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jnslayanan  $jnslayanan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $datas = jnslayanan::find($id);
        return view('admin.jnslayanan.ubah',compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatejnslayananRequest  $request
     * @param  \App\Models\jnslayanan  $jnslayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = jnslayanan::findOrFail($id);
        $data = $request->all();
    
      
        
        $model->name = $request->name;
       

        $validasi = Validator::make($data, [
            'name' => 'required|max:191',
        ]);
        if ($validasi->fails()) {
            return redirect()->route('jns.edit', $id)->withInput()->withErrors($validasi);
        }
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/jnslayanan';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }
        $model->save();

        
        return redirect('/jns')->with('success','berhasil di ubah ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jnslayanan  $jnslayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = jnslayanan::find($id);
        $hapus->delete();        
        return redirect('jns')->with('success','berhasil di hapus');
    }
}

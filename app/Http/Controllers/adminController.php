<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\LaporanExport;
use App\Models\cart;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
class adminController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  User::where('name','like',"%".$cari."%")->Where('level' , 2)->get();
        return view('superadmin.admin.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('superadmin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreadminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $model = new User;
        $password = $request->password;
        $encrypted_password = bcrypt($password);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = $encrypted_password;
        $model->level =  $request->level;
        $model->email_verified_at =  Carbon::now();       
        

        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
           
            'email' => 'required|email|unique:users',
            
            'password'=>'required|min:8',

        ]);
        if ($validasi->fails()) {
            return redirect()->route('dataadmin.create')->withInput()->withErrors($validasi);
        }
       
        $model->save();

        
        return redirect('/dataadmin')->with('success','data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = admin::find($id);
        return view("admin.admin.   ",compact("datas"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = User::find($id);
        
        return view('superadmin.admin.ubah',compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateadminRequest  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id )
    {
        $data = $request->all();
        $model = User::findOrFail($id);

     
        $model->name = $request->name;
        $model->email = $request->email;

        

        $validasi = Validator::make($data, [
            'name' => 'required|max:255',
           
            'email' => 'required|email',
            
         
        ]);
       

      
        if ($validasi->fails()) {
            return redirect()->route('dataadmin.edit', $id)->withInput()->withErrors($validasi);
        }
      
        $model->save();

        
        return redirect('/dataadmin')->with('success','data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = User::find($id);
        $hapus->delete();
        
        return redirect('dataadmin')->with('success','data berhasil di hapus');
    }
    
}

<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use App\Models\layanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDF;
use App\Exports\TransaksiExport;

class laporanController extends Controller
{
    public function index(){
        $datas =  transaksi::with([
            'transaksi','transaksiuser'
        ])->get();
         $data =  layanan::with(['carts', 'layanan'])->get();
        
        return view('admin.laporan.index', compact('datas','data'));
    }
    public function excel(){
        ob_end_clean(); // this
        ob_start();
        return Excel::download(new TransaksiExport, 'laporantransaksi.xlsx');
      
    }
    public function pdf(){
       $datas =  transaksi::with([
        'transaksi','transaksiuser'
    ])->get();
    $data =  layanan::with(['carts', 'layanan'])->get();
        $pdf = PDF::loadview('admin.laporan.pdf', compact('datas','data'));
        return $pdf->download('laporanpdf.pdf');
       
    }
}

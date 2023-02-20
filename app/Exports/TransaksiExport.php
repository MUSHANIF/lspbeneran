<?php

namespace App\Exports;

use App\Models\transaksi;
use App\Models\layanan;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class TransaksiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function view(): View
    {
        return view('admin.laporan.excel', [
            'datas' =>  transaksi::with([
                'transaksi','transaksiuser'
            ])->get(),
            'data' => layanan::with(['carts', 'layanan'])->get()
        ]);
    }
}

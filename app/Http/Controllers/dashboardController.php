<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\layanan;
use App\Models\transaksi;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request) {
        return view('dashboard',[
                
            'user' => User::where('level','=', 1)->count(),
            'admin' => User::where('level', '=', 2)->count(),
            'transaksi' => transaksi::count(),
            'layanan' => layanan::where('status', '=', 1)->count(),
            
        
        ]);
    }
}

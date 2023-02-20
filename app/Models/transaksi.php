<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public function transaksi()
    {
        return $this->belongsTo(cart::class, 'cartid', 'id');
    }
    public function transaksiuser()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
}

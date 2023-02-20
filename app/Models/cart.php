<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }
    public function cart()
    {
        return $this->belongsTo(layanan::class, 'layananid', 'id');
    }
     public function jns()
    {
        return $this->belongsTo(jnslayanan::class, 'jnsid', 'id');
    }
    public function trans()
    {
        return $this->hasOne(transaksi::class, 'cartid', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class layanan extends Model
{
    use HasFactory;
    public function layanan()
    {
        return $this->belongsTo(jnslayanan::class, 'jnsid', 'id');
    }
    public function kurs()
    {
        return $this->hasMany(kursi::class, 'layananid', 'id');
    }
     public function carts()
    {
        return $this->hasMany(cart::class, 'layananid', 'id');
    }
    public function layan()
    {
        return $this->hasOne(layanan::class,  'id');
    }
    public function gallery()
    {
        return $this->hasMany(gallery::class, 'layananid', 'id');
    }
}

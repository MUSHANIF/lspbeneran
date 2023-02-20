<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kursi extends Model
{
    use HasFactory;
    public function kur()
    {
        return $this->belongsTo(layanan::class, 'layananid', 'id');
    }
}

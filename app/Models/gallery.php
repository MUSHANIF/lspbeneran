<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    use HasFactory;
    public function galleryy()
    {
        return $this->belongsTo(layanan::class, 'layananid', 'id');
    }
}

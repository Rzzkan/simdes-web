<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaDesaModel extends Model
{
    use HasFactory;

    protected $table = 'peta_desa';

    protected $fillable = [
        'keterangan', 'url_maps'
    ];

    protected $hidden = [];
}

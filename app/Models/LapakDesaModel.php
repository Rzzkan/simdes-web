<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapakDesaModel extends Model
{
    use HasFactory;

    protected $table = 'lapak_desa';

    protected $fillable = [
        'id_user', 'id_kategori', 'judul', 'harga', 'deskripsi', 'gambar'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}

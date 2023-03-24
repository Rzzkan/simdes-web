<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BeritaModel extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'id_user', 'id_kategori', 'judul', 'deskripsi', 'gambar'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}

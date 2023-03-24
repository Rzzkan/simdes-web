<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanModel extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'id_user', 'id_kategori', 'judul', 'deskripsi', 'gambar'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}

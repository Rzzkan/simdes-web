<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWargaModel extends Model
{
    use HasFactory;

    protected $table = 'profil';

    protected $fillable = [
        'id_user', 'no_hp', 'tempat_lahir', 'Tanggal_lahir',
        'jenis_kelamin', 'alamat', 'agama', 'status_perkawinan',
        'pekerjaan', 'kewarganegaraan', 'pendidikan', 'status_penduduk',
        'penyandang_cacat', 'penyakit_menahun', 'status_vaksin'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}

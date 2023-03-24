<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratPengajuanSuratUserModel extends Model
{
    use HasFactory;

    protected $table = 'syarat_pengajuan_surat_user';

    protected $fillable = [
        'id_user', 'id_pengajuan_surat', 'id_syarat', 'berkas'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function syarat()
    {
        return $this->hasOne(SyaratPengajuanSuratModel::class, 'id', 'id_syarat');
    }
}

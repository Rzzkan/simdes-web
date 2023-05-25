<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSuratModel extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat';

    protected $fillable = [
        'nama', 'keterangan', 'status'
    ];

    protected $hidden = [];

    public function syarat()
    {
        return $this->hasMany(SyaratPengajuanSuratModel::class, 'id_jenis_surat', 'id');
    }
}

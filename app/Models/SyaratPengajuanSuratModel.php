<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratPengajuanSuratModel extends Model
{
    use HasFactory;

    protected $table = 'syarat_pengajuan_surat';

    protected $fillable = [
        'id_jenis_surat', 'nama', 'keterangan'
    ];

    protected $hidden = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSuratModel extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_surat';

    protected $fillable = [
        'id_user', 'id_jenis_surat', 'tindakan', 'catatan', 'berkas', 'status_notif'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function surat()
    {
        return $this->hasOne(JenisSuratModel::class, 'id', 'id_jenis_surat');
    }
}

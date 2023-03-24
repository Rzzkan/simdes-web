<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APBDesaModel extends Model
{
    use HasFactory;

    protected $table = 'apb_desa';

    protected $fillable = [
        'id_user', 'judul', 'berkas'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}

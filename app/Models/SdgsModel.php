<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SdgsModel extends Model
{
    use HasFactory;

    protected $table = 'sdgs';

    protected $fillable = [
        'sdgs_1', 'sdgs_2', 'sdgs_3', 'sdgs_4', 'sdgs_5', 'sdgs_6', 'sdgs_7', 'sdgs_8', 'sdgs_9', 'sdgs_10', 'sdgs_11', 'sdgs_12', 'sdgs_13', 'sdgs_14', 'sdgs_15', 'sdgs_16', 'sdgs_17', 'sdgs_18'
    ];

    protected $hidden = [];
}

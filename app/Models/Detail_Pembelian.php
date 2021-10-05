<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Pembelian extends Model
{
    use HasFactory;
    protected $table = 'detail_pembelians';
    protected $primaryKey = 'id_detail';
    protected $guarded = [
        'id_detail',
    ];
}

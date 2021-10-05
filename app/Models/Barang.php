<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id', 'id');
    }
    public function satuan(){
        return $this->belongsTo(Satuan::class, 'id', 'id');
    }
    public function pemasok(){
        return $this->belongsTo(Pemasok::class, 'id', 'id');
    }
}

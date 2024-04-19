<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\barang_keluar;
use App\Models\barang_masuk;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;
    protected $guarded = [];
    public function barang_keluar(){
        return $this->hasMany(barang_keluar::class);
    }
    public function barang_masuk(){
        return $this->hasMany(barang_masuk::class);
    }
}

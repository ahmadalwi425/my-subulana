<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;
    protected $guarded = [];
    public function penjual(){
        return $this->belongsTo(User::class, 'id_penjual');
    }
    public function pembeli(){
        return $this->belongsTo(User::class, 'id_pembeli');
    }
}

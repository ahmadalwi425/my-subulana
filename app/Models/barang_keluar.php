<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\barang;


class barang_keluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_barang_keluar';
    public $timestamps = false;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}

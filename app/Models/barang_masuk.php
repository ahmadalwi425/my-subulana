<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\barang;
use App\Models\User;


class barang_masuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';
    public $timestamps = false;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class konfirmasi extends Model
{
    use HasFactory;
    protected $table = 'konfirmasi';
    protected $primaryKey = 'id_konfirmasi';
    public $timestamps = false;
    protected $guarded = [];
    public function santri(){
        return $this->belongsTo(User::class, 'id_santri');
    }
}

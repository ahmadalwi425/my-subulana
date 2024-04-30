<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class kiriman_manual extends Model
{
    use HasFactory;
    protected $table = 'kiriman_manual';
    protected $primaryKey = 'id_kiriman_manual';
    public $timestamps = false;
    protected $guarded = [];
    public function santri(){
        return $this->belongsTo(User::class, 'id_santri');
    }
}

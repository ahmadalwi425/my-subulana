<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\level;
use App\Models\barang_keluar;
use App\Models\barang_masuk;
use App\Models\transaksi;
use App\Models\konfirmasi;
use App\Models\kiriman;
use App\Models\kiriman_manual;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function level(){
        return $this->belongsTo(level::class, 'id_level');
    }
    public function barang_keluar(){
        return $this->hasMany(barang_keluar::class);
    }
    public function barang_masuk(){
        return $this->hasMany(barang_masuk::class);
    }
    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
    public function kiriman(){
        return $this->hasMany(kiriman::class);
    }
    public function kiriman_manual(){
        return $this->hasMany(kiriman_manual::class);
    }
    public function konfimasi(){
        return $this->hasMany(kkonfirmasi::class);
    }
}

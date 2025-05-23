<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_toko',
        'alamat_kota',
        'alamat_lengkap',
        'no_wa',
        'user_id'
    ];

    public function main(){
        return $this->hasMany(Main::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    protected $fillable = [
       'nama_barang',
       'harga',
       'diskon',
       'promo',
       'qty',
       'deskripsi',
       'category_id',
       'store_id',
       'user_id',
       'foto',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }


}

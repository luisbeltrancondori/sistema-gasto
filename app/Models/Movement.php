<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;
    protected $table = 'movements';
    protected $fillable = ['detail','date','user_id','account_id','categorie_id','movementtype_id','status','coin_id','amount'];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function coin(){
        return $this->belongsTo(Coin::class);
    }

    public function movementtype(){
        return $this->belongsTo(Movementtype::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

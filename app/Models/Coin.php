<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;
    protected $table = 'coins';
    protected $fillable = ['name','symbol','code','country','status'];

    public function movement(){
        return $this->hasMany(Movement::class);

    }
}

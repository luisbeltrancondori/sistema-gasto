<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movementtype extends Model
{
    use HasFactory;
    protected $table = 'movementtypes';
    protected $fillable = ['name','description','status'];

    public function movement(){
        return $this->hasMany(Movement::class);
    }
}

<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}

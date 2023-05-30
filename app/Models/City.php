<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id'
    ];

    public function states(){
        return $this->belongsTo(State::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_feature extends Model
{
    public function car(){
        return $this->hasMany(Car::class);
    }
}

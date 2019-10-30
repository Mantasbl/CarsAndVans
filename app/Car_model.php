<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_model extends Model
{
    public function make() {
        return $this->belongsTo(Make::class);
    }
    public function model_detail() {
        return $this->belongsTo(Model_detail::class);
    }
    public function car(){
        return $this->hasMany(Car::class);
    }
}

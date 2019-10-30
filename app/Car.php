<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];
    public function car_model() {
        return $this->belongsTo(Car_model::class);
    }
    public function car_feature() {
        return $this->belongsTo(Car_feature::class);
    }
}

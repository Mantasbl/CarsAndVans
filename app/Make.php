<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    public function car_models() {
        return $this->hasMany(Car_model::class);
    }
}

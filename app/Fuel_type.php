<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel_type extends Model
{
     public function model_details() {
         return $this->hasMany(Model_detail::class);
     }
}

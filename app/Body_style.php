<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Body_style extends Model
{
    public function model_details() {
        return $this->hasMany(Model_detail::class);
    }
}

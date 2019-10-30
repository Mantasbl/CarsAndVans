<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    
    public function engines() {
        return $this->hasMany(Engine::class);
    }
}

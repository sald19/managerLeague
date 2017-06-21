<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}

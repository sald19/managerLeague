<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{


    /**
     * {@inheritdoc}
     */
    protected $fillable = ['name', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}

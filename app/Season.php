<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function league()
    {
        return $this->belongsTo(League::class);
    }
}

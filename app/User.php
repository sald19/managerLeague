<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];



    protected $appends = ['selectedLeague'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function leagues()
    {
        return $this->belongsToMany(League::class, 'league_user', 'user_id', 'league_id');
    }

    public function league($season = false)
    {
        $league = $this->leagues()->where('default', 1)->first();

        if($season) {
            $league->season = $league->season();
        }

        return $league;
    }
}

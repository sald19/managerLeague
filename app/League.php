<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use Sluggable;

    /**
     * {@inheritdoc}
     */
    protected $fillable = ['name', 'email', 'default'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function season()
    {
        return $this->seasons()->latest('star_at')->first();
    }

    public function invitations()
    {
        return $this->morphMany(Invitation::class, 'hostable');
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'league_user', 'league_id', 'user_id');
    }
}

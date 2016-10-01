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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A User has many Challenges
     *
     * @return Collection
     */
    public function challenges()
    {
        return $this->hasMany('App\Challenge');
    }

    /**
     * A User has many Comments
     *
     * @return Collection
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * A User has many Ratings
     *
     * @return Collection
     */
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    /**
     * A User has many Favorites
     *
     * @return Collection
     */
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
}

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
     * A User has many Reviews
     *
     * @return Collection
     */
    public function reviews()
    {
        return $this->hasMany('App\Review');
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

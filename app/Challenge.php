<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'difficulty_id',
        'user_id',
        'game_id',
        'platform_id',
        'language_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * A Challenge belongs to a User
     *
     * @return Collection
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A Challenge belongs to a Game
     *
     * @return Collection
     */
    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    /**
     * A Challenge belongs to a Difficulty
     *
     * @return Collection
     */
    public function difficulty()
    {
        return $this->belongsTo('App\Difficulty');
    }

    /**
     * A Challenge belongs to a Platform
     *
     * @return Collection
     */
    public function platform()
    {
        return $this->belongsTo('App\Platform');
    }

    /**
     * A Challenge belongs to a Language
     *
     * @return Collection
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    /**
     * A Challenge can have Comments
     * @return Collection
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * A Challenge can have Ratings
     * @return Collection
     */
    public function ratings()
    {
        return $this->morphMany('App\Rating', 'rateable');
    }
}
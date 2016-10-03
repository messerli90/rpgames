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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['average_review', 'count_favorites'];

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
     * A Challenge can have Favorites
     *
     * @return Collection
     */
    public function favorites()
    {
        return $this->morphMany('App\Favorite', 'favoritable');
    }

    /**
     * A Challenge can have Reviews
     * @return Collection
     */
    public function reviews()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }

    /**
     * A Challenge has many Videos
     * @return Collection
     */
    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    /**
     * Get the average review of this Challenge
     *
     * @return double
     */
    public function getAverageReviewAttribute()
    {
        return round($this->reviews()->avg('value'), 1);
    }

    /**
     * Get the count of Favorites for this Challenge
     *
     * @return int
     */
    public function getCountFavoritesAttribute()
    {
        return (int) $this->favorites()->count();
    }

    /**
     * Sanitizes input to be used with Markdown Parser
     *
     * @param String $value
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = filter_var($value, FILTER_SANITIZE_STRING);
    }

    /**
     * Increment number of views for this Challenge
     */
    public function incrementViews()
    {
        $this->increment('views');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'url',
        'challenge',
        'user_id'
    ];

    /**
     * A Video belongs to a User
     *
     * @return Collection
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A Video belongs to a Challenge
     *
     * @return Collection
     */
    public function challenge()
    {
        return $this->belongsTo('App\Challenge');
    }

    public static function transformURL($provided_url)
    {
        if (strpos($provided_url, '/embed') !== false) {
            $new_url =  $provided_url;
        } elseif (strpos($provided_url, 'youtu.be/') !== false) {
            $new_url = str_replace('youtu.be/', 'youtube.com/embed/', $provided_url);
        } elseif (strpos($provided_url, 'youtube.com/') !== false) {
            $new_url = str_replace('youtube.com/watch?v=', 'youtube.com/embed/', $provided_url);
        } else {
            return false;
        }

        return $new_url;
    }
}

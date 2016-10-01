<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'favoritable_id', 'favoritable_type'];

    /**
     * A Favorite belongs to a User
     *
     * @return Collection
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A Favorite morphs to another Model
     * @return Collection
     */
    public function favoritable()
    {
        return $this->morphTo();
    }
}

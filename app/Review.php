<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
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
        'user_id',
        'rateable_id',
        'rateable_type',
        'value',
        'body'
    ];

    /**
     * A Review belongs to a User
     *
     * @return Collection
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A Review morphs to another Model
     * @return Collection
     */
    public function rateable()
    {
        return $this->morphTo();
    }

    /**
     * Return star icons
     *
     * @return String
     */
    public static function getStars($value)
    {
        $return = '';
        for ($i=1; $i <= 5; $i++) {
            if($i <= $value) {
                $return .= '<i class="fa fa-star"></i>';
            } else {
                $return .= '<i class="fa fa-star-o"></i>';
            }
        }

        return $return;
    }
}

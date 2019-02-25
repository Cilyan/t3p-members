<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'trail_date', 'helper_subscriptions_open'
    ];

    public function helpers()
    {
        return $this->hasMany(Helper::class)->where('helper.active', 1);
    }

    public function all_helpers()
    {
        return $this->hasMany(Helper::class);
    }
}

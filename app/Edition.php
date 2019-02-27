<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'trail_date', 'helper_subscriptions_open'
    ];

    public function helpers()
    {
        return $this->hasMany(Helper::class)->where('helper.active', 1);
    }

    public function all_helpers()
    {
        return $this->hasMany(Helper::class);
    }

    public static function active_for_helpers() {
        return Edition::whereDate(
            'helper_subscriptions_open', '<=', Carbon::today()->toDateString()
        )->whereDate(
            'trail_date', '>=', Carbon::today()->toDateString()
        );
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Profile;
use App\Edition;

class Helper extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_provider', 'legal_age', 'first_responder',
        'driving_license', 'driving_license_location',
        'prefered_activity', 'comment', 'prefered_sector',
        'housing',

        'sleep_day_before', 'day_before_meal', 'after_event_meal'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'active' => true,
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }
}

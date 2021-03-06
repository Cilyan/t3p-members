<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Helper;
use App\Models\Edition;
use Carbon\Carbon;

class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'birthday', 'country',
        'administrative_area', 'locality', 'postal_code', 'thoroughfare',
        'premise', 'phone', 'tshirt_size', 'tshirt_gender'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'country' => 'FR',
        'tshirt_size' => 'm',
        'tshirt_gender' => 'M',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthday',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function helper(Edition $edition)
    {
        return $this->hasMany(Helper::class)
            ->where('helper.edition_id', $edition->id)->first();
    }

    public function helpers()
    {
        return $this->hasMany(Helper::class);
    }

    public function helpers_active()
    {
        return $this->helpers()->whereHas('edition',
            function ($query) {
                $query->whereDate(
                    'helper_subscriptions_open', '<=', Carbon::today()->toDateString()
                )->whereDate(
                    'trail_date', '>=', Carbon::today()->toDateString()
                );
            }
        );
    }

    public function helpers_latest()
    {
        return $this->helpers()->latest()->first();
    }

    public function slug() {
        return Str::slug($this->first_name . " " . $this->last_name . " " . $this->id);
    }

    public function full_name() {
        return $this->first_name . " " . $this->last_name;
    }
}

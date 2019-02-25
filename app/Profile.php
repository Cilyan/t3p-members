<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\User;
use App\Helper;
use App\Edition;

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

    public function slug() {
        return Str::slug($this->first_name . " " . $this->last_name . " " . $this->id);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\User');
    }
}

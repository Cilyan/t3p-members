<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Monarobase\CountryList\CountryListFacade as CountryList;

class Country implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return array_key_exists($value, CountryList::getList('fr', 'php'));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.country');
    }
}

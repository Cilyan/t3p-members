<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        /* Accept several formats for the date */
        if ($this->has('birthday')) {
            $birthday = DateTime::createFromFormat("!Y-m-d", $this->birthday);
            if (!$birthday) {
                $birthday = DateTime::createFromFormat("!d/m/Y", $this->birthday);
            }
            if (!$birthday) {
                $birthday = DateTime::createFromFormat("!d/m/y", $this->birthday);
            }
            if ($birthday) {
                $this->merge(
                    [
                        'birthday' => $birthday->format("Y-m-d"),
                    ]
                );
            }
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required|date_format:Y-m-d|before:today',
            'country' => 'required',
            'administrative_area' => 'nullable|required_without_all:locality,postal_code,thoroughfare,premise',
            'locality' => 'nullable|required_without_all:administrative_area,postal_code,thoroughfare,premise',
            'postal_code' => 'nullable|required_without_all:administrative_area,locality,thoroughfare,premise',
            'thoroughfare' => 'nullable|required_without_all:administrative_area,locality,postal_code,premise',
            'premise' => 'nullable|required_without_all:administrative_area,locality,postal_code,thoroughfare',
            'phone' => 'nullable',
            'tshirt_size' => 'required|in:xs,s,m,l,xl,xxl',
            'tshirt_gender' => 'required|in:M,F',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}

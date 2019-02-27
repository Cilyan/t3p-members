<?php

namespace App\Http\Requests;

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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required|date',
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
        return [
            'administrative_area.required_without_all' => 'Address is required',
            'locality.required_without_all' => 'Address is required',
            'postal_code.required_without_all' => 'Address is required',
            'thoroughfare.required_without_all' => 'Address is required',
            'premise.required_without_all' => 'Address is required',
        ];
    }
}

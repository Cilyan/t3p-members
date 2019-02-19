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
            'birthday' => 'nullable|date',
            'country' => 'nullable',
            'administrative_area' => 'nullable',
            'locality' => 'nullable',
            'postal_code' => 'nullable',
            'thoroughfare' => 'nullable',
            'premise' => 'nullable',
            'phone' => 'nullable',
            'tshirt_size' => 'nullable|in:xs,s,m,l,xl,xxl',
            'tshirt_gender' => 'nullable|in:M,F',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_admin == true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'trail_date' => 'required|date',
            'helper_subscriptions_open' => 'nullable|date'
        ];

        if ($this->routeIs("*.store")) {
            $rules['id'] = 'required|integer|gte:2000|unique:editions,id';
        }

        return $rules;
    }
}

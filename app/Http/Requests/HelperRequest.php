<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelperRequest extends FormRequest
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
        $rules = [
            'legal_age' => 'required|boolean',
            'first_responder' => 'required|boolean',
            'driving_license' => 'nullable|required_with:driving_license_location',
            'driving_license_location' => 'nullable|required_with:driving_license',
            'prefered_activity' => 'required|in:any,welcoming,way_directions,beaconing,organisation,refreshment_booth,opener_closer',
            'prefered_sector' => 'required|in:any,augirein,arbas',
            'comment' => 'nullable|max:300',
            'housing' => 'nullable|max:50',
            'sleep_day_before' => 'required|boolean',
            'day_before_meal' => 'required|boolean',
            'after_event_meal' => 'required|boolean',
        ];

        if ($this->routeIs("*.store")) {
            $profile = $this->profile;
        }
        else {
            $profile = $this->helper->profile;
        }

        if ($profile->phone) {
            $rules['phone_provider'] = 'required|max:50';
        }

        return $rules;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        /* Covid-19: We can no longer offer meals at the moment */
        $this->merge([
            'day_before_meal' => false,
            'after_event_meal' => false
        ]);
    }
}

<?php
namespace App\Http\Requests\Frontend\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'             => 'required|max:20',
            'last_name'              => 'required|max:20',
            'phone'                  => 'required|max:20',
            'bio'                    => 'required|max:500',
            'sub_bio'                => 'required|max:200',
            'avatar'                 => 'nullable|image',
            'hire_thumbnail'         => 'nullable|image',
            'tagline'                => 'required|max:255',
            'years_in_business'      => 'required',
            'languages'              => 'required',
            'why_should_you_hire_me' => 'required',
            'locations'              => 'required|array',
            'position'               => 'required|max:20',
            'company'                => 'required|max:20',
            'location_id'            => 'required',
        ];
    }

    public function messages()
    {
        return [
            'location_id.required'  => 'Primary location is required',
            'locations.required'    => 'Business locations is required',
            'why_should_you_hire_me.required'  => 'Link is required',
        ];
    }
}

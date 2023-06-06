<?php
namespace App\Http\Requests\Frontend\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'         => 'required|max:20',
            'last_name'          => 'required|max:20',
            'phone'              => 'required|max:20',
            'bio'                => 'required|max:255',
            'avatar'             => 'nullable|image',
        ];
    }
}

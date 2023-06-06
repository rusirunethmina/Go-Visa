<?php
namespace App\Http\Requests\Frontend\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordChangeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:6',
        ];
    }
}

<?php
namespace App\Http\Requests\Frontend\Review;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'star'         => 'required',
            'provider_id'  => 'required',
        ];
    }
}

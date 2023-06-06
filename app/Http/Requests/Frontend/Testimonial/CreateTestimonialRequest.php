<?php
namespace App\Http\Requests\Frontend\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class CreateTestimonialRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'link'        => 'required|url',
            'thumbnail'   => 'nullable',
            'is_featured' => 'nullable',
        ];
    }
}

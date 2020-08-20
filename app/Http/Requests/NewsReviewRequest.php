<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsReviewRequest extends FormRequest
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
            'name'   => ['required', 'string', 'min:5', 'max:100'],
            'review' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'name'       => 'имя',
            'review'     => 'отзыв'
        ];
    }
}

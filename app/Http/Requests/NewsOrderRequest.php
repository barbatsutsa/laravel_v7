<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsOrderRequest extends FormRequest
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
            'phone' => ['required', 'digits:12'],
            'info' => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'phone'       => 'номер телефона',
            'info'        => 'необходимая информация'
        ];
    }
}

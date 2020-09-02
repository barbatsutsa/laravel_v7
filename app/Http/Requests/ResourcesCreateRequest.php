<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourcesCreateRequest extends FormRequest
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
            'title'   => ['required', 'string', 'min:5', 'max:100'],
            'url' => ['required', 'string', 'url']
        ];
    }

    public function attributes()
    {
        return [
            'title'       => 'название',
            'url'         => 'ссылка'
        ];
    }
}

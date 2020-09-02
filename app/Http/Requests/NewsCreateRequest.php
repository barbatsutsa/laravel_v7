<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
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
            'title'       => ['required', 'string', 'min:5', 'max:100'],
            'img'         => ['required', 'image', 'mimes:jpeg,bmp,png'],
            'slug'        => ['sometimes'],
            'description' => ['required', 'string'],
            'link'        => ['sometimes','string', 'url'],
            'pub_date'    => ['sometimes','timestamp'],
        ];
    }

    public function attributes()
    {
        return [
            'title'       => 'заголовок',
            'img'         => 'изображение',
            'description' => 'описание',
            'link'        => 'ссылка',
            'pub_date'    => 'дата публикации',
        ];
    }

    public function messages()
    {
        return ['url' => 'Это поле должно быть url'];
    }
}

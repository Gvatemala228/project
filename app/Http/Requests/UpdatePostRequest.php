<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Check;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'category_id' => ['required', new Check],
            'content' => 'required',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно к заполнению',
            'title.max' => 'В названии может быть не более 100 символов',
            'category_id.required' => 'Это поле обязательно к заполнению',
            'content.required' => 'Это поле обязательно к заполнению',
            'image.required' => 'Это поле обязательно к заполнению',
        ];
    }
}

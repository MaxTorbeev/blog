<?php

namespace MaxTor\Content\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
             'name'      => 'required',
             'slug'      => 'required|unique:tags|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => 'Тег необходимо назвать',
            'slug.required'         => 'Нужно указать алиас',
            'slug.unique'           => 'Такой алиас уже существут',
        ];
    }
}

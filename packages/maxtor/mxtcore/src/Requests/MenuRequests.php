<?php

namespace MaxTor\MXTCore\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequests extends FormRequest
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
            'title'             => 'required',
            'published'         => 'required|integer',
//            'menu_type_id'      => 'integer',
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
            'title.required'            => 'Menu title is required',
        ];
    }
}

<?php

namespace MaxTor\MXTCore\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtensionsRequests extends FormRequest
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
            'name'              => 'required|unique:extensions',
            'controller_path'   => 'required|unique:extensions|max:255',
            'enabled'           => 'required|integer',
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
            'name.required'             => 'A name is required',
            'name.unique'               => 'A name is unique',
            'controller_path.required'  => 'A controller path is required',
            'controller_path.unique'    => 'A controller path is unique',
        ];
    }
}

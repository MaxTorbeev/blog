<?php

namespace MaxTor\Content\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name'      => 'required|max:255',
            'full_text' => 'required',
//            'slug'      => 'required|unique:posts|max:255',
            'metadesc'  => 'max:255',
            'metakey'   => 'max:255',
        ];
    }
}

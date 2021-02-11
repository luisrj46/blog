<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreResquest extends FormRequest
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
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
            'tags'=>'required',
            'excerpt'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'el titulo esta mal',//personalizar el mensaje de error

        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        // dd($this->route('user')->id); //recibiendo el valor de los parametros desde el route
        $rules=[
            'name'=>'required',
            // 'email'=>['required',Rule::unique('users')->ignore($this->route('user')->id)]
            'email'=>'required|unique:users,email,'.$this->route('user')->id,

        ];

        if ($this->filled('password')) {
                $rules['password']=['confirmed','min:6'];
        }
        return $rules;
    }
}

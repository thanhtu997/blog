<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
            'password'  => 'required',
            'password_comfirm' => 'required|same:password'
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'email' => ':attribute không đúng ',
            'unique'  => ':attribute không được trùng',
            'password_comfirm.same'  => 'mật khẩu không khớp'
        ];
    }
}

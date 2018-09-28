<?php

namespace App\Http\Requests;

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
            'sltparent' => 'required',
            'title'     => 'required|unique:posts,title',
            'thumbnail'     => 'required|image',
            'content'   =>  'required',
            'tag'   => 'required'    
        ];
    }

    public function messages()
    {
        return [
            'sltparent.required' => 'Vui lòng chọn danh mục',
            'title.required'    =>  'Title không được để trống.',
            'title.unique'      => 'title đã tồn tại',
            'thumbnail.required'    => 'Vui lòng chọn ảnh.',
            'thumbnail.image'    => 'Định dạng ảnh không đúng.',
            'content.required'  => 'Nội dung không được để trống.',
            'tag.required'  => 'Vui lòng nhập tag.'
        ];
    }
}

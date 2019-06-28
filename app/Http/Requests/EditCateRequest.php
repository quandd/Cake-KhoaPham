<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCateRequest extends FormRequest
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
            //
            'img'=>'image',
            'name'=>'required|min:3|max:30|unique:type_products,name,'.$this->segment(4).',id'
        ];
    }

    public function messages(){
        return[
            'name.unique'=>'Ten danh muc da bi trung',
            'img.image'=>'Vui long chon file anh(jpg,png,...)',
            'name.required'=>'Moi nhap ten danh muc',
            'name.min'=>'Ten danh muc phai nhieu hon 3 ki tu',
            'name.max'=>'Ten danh muc phai it hon 30 ki tu'
        ];
    }
}

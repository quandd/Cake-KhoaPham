<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'img'=>'required|image',
            'name'=>'required|min:3|max:30|unique:products,name,'.$this->segment(4).',id'
        ];
    }

    public function messages(){
        return[
            'img.image'=>'Vui long chon file anh(jpg,png,...)',
            'img.required'=>'Vui long chon file anh',
            'name.unique'=>'Ten san pham da bi trung',
            'name.required'=>'Moi nhap ten san pham',
            'name.min'=>'Ten san pham phai nhieu hon 3 ki tu',
            'name.max'=>'Ten san pham phai it hon 30 ki tu'
        ];
    }
}

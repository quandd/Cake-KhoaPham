<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=>'required|min:3|max:30|unique:products,name'
        ];
    }
    public function messages(){
        return[
            'img.image'=>'Vui long chon file anh(png,jpg,...)',
            'img.required'=>'Vui long chon file anh',
            'name.unique'=>'San pham da ton tai',
            'name.required'=>'Moi nhap ten san pham',
            'name.min'=>'Ten san pham phai nhieu hon 3 ki tu',
            'name.max'=>'Ten san pham phai it hon 30 ki tu'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NameLengthRule;

class AddCateRequest extends FormRequest
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
            'name'=>['required','unique:type_products,name',new NameLengthRule]
        ];
    }

    public function messages(){
        return[
            'name.unique'=>'Ten danh muc da bi trung',
            'img.image'=>'Vui long chon file anh(jpg,png,...)',
            'img.required'=>'Vui long chon file anh',
            'name.required'=>'Moi nhap ten danh muc',
        ];
    }
}

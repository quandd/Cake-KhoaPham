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
            'img'=>'image',
            'name'=>'unique:products,name'
        ];
    }
    public function messages(){
        return[
            'img.image'=>'Moi chon file anh',
            'name.unique'=>'San pham da ton tai'
        ];
    }
}

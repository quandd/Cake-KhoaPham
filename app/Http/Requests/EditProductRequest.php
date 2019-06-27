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
            'img'=>'image',
            'name'=>'unique:products,name,'.$this->segment(4).',id'
        ];
    }

    public function messages(){
        return[
            'name.unique'=>'Ten danh muc da bi trung',
            'name.unique'=>'Ten san pham da bi trung'
        ];
    }
}

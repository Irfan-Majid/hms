<?php

namespace App\Http\Requests\MedGenReq;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
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
        $id=Request::instance()->id;
        
        return [
            "name" => "required|unique:medicinegenerics,name,$id",
            "description" => "required"
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required'
        ];
    }
}

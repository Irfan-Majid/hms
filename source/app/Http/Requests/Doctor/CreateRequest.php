<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required',
            'contact' =>'required|unique:users',
            'email' => 'required|unique:users',
            'b_date' => 'required',
            'address' => 'required',
            'e_qualification'=> 'required',
            'specialization' => 'required',
            'designation' =>'required',
            'department' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'image' => 'required',
            'fee'=>'required'




        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required'
        ];
    }
}

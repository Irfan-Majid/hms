<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

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
        $user_id=Request::instance()->user_id;
        return [

            "name" => "required",
            "contact" =>"required|unique:users,contact,$user_id",
            "email" => "required|unique:users,email,$user_id",
            "b_date" => "required",
            "address" => "required",
            "e_qualification"=> "required",
            "designation" =>"required",
            "username" => "required|unique:users,username,$user_id"

        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required'
        ];
    }
}

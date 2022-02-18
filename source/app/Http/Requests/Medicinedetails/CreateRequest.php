<?php

namespace App\Http\Requests\Medicinedetails;

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
            'name' => 'required|unique:medicinedetails',
            'description' =>'required',
            'medicinebrand_id' => 'required',
            'medicinegeneric_id' => 'required',
            'purchase_price' => 'required',
            'sale_price'=> 'required',
            'image' => 'required'

        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required',
            'purchase_price.required'=>'The Purchase Price is required',
            'sale_price.required'=>'The Sale Price is required',
        ];
    }
}

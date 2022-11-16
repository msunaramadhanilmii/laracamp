<?php

namespace App\Http\Requests\Admin\Discount;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class Update extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return Auth::check() && Auth::user()->is_admin;
    }
    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'code' => 'required|string|max:5|unique:discounts,code,'.$this->id.',id',
            'description' => 'nullable|string',
            'percentage' => 'required|min:1|max:100|numeric'
        ];
    }
}

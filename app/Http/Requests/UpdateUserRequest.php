<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|string|email|max:255',
            'address' => 'required' ,
            'password' => 'required| string',
            'department_id' => 'required' ,
            'role_id' => 'required' ,
            'designation' => 'required',
            'start_from' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ];
    }
}

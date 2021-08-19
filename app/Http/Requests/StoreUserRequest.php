<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required' ,
            'password' => 'required| string',
            'department_id' => 'required' ,
            'role_id' => 'required' ,
            'position' => 'required',
            'start_from' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ];
    }
}

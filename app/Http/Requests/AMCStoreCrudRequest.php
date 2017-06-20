<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AMCStoreCrudRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'required',
            'username' => 'required|min:6|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'phone_number' => 'required|min:10',
            'email' => 'required|email|unique:users',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'company_name' => 'Company name',
            'username' => 'Username',
            'password' => 'Password',
            'password_confirmation' => 'Password confirmation',
            'phone_number' => 'Phone number',
            'email' => 'Email',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute can\'t be empty.',
            'min' => 'Please enter :attribute at least :min characteristic.',
            'unique' => ':attribute is already in the database.',
            'email' => 'Please enter a valid email address.',
        ];
    }
}

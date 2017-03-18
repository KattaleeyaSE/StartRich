<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MemberUpdateCrudRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|min:6|unique:users,username,'.$this->request->get('id'),
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required|min:10',
            'email' => 'required|email|unique:users,email,'.$this->request->get('id'),
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
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'username' => 'username',
            'password' => 'password',
            'phone_number' => 'phone number',
            'email' => 'email',
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
            'required' => 'Text field is required.',
            'min' => 'Please enter :attribute at least :min characteristic.',
            'unique' => ':attribute is duplicate with the database.',
            'email' => 'Please enter a valid email address.',
        ];
    }
}

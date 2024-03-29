<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'username' => 'min:8|max:255',
            'name'  =>  'required|max:255',
            'email' =>  'required|max:255|email|unique:users',
            'phone' => 'required|max:16',
            'password'  =>  'required|min:8|max:255',
        ];
    }
}

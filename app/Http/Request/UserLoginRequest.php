<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * User must not be logged into an account.
     *
     * @return bool
     */
    public function authorize()
    {
        return !session()->has('user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
            [
                'email'         => 'required|email',
                'passwordHash'  => 'required'
            ];
    }

    /**
     * Get the error messages
     *
     * @return array
     */
    public function messages()
    {
        return
        [
            'email'         => 'Email invalide',
            'passwordHash'  => 'Mot de passe requis'
        ];
    }
}

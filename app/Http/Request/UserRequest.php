<?php

namespace App\Http\Requests;

use App\ApiModelHydrator;
use App\Gestion\APIRequestGestion;
use App\Gestion\UserAuthApiGestion;
use Illuminate\Foundation\Http\FormRequest;
use mysql_xdevapi\Exception;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Everyone can create a new account.
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
        $max = '22';

        return
            [
                'name'                  => 'required|max:255|alpha_num',
                'email'                 => 'required|email',
                'passwordHash'          => 'required|min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/',
                'password_confirmation' => 'same:passwordHash',
                'school'                => 'required|numeric|between:1,'.$max,
                'legals'                => 'required'
            ];
    }

    /**
     * Get the error messages
     *
     * @return array|void
     */
    public function messages() {
        $schools = ApiModelHydrator::hydrateAll('App\School', APIRequestGestion::get('/schools', $this->token, null));

        return
        [
            'name'                  => 'Nom d\'utilisateur invalide.',
            'email'                 => 'Email invalide.',
            'passwordHash'          => 'Le mot de passe doit contenir une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial et faire au moins huit caractères de long.',
            'password_confirmation' => 'Les mots de passe ne correspondent pas.',
            'school'                => 'L\'école spéficiée est invalide.',
            'legals'                => 'Vous devez accepter les conditions pour vous inscrire.'
        ];
    }
}

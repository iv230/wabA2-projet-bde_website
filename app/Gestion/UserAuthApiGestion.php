<?php


namespace App\Gestion;

class UserAuthApiGestion
{
    const API_USER = "utilisateurultrasecretdelapi";
    const API_PASSWORD = "motdepasseultrascretdelapi";

    /**
     * Generate a token for API REST requetes
     * @return mixed
     */
    static function authenticate()
    {
        return APIRequestGestion::post('/auth', null,
            [
                'username'       => self::API_USER,
                'password' => self::API_PASSWORD
            ])->{'token'};
    }
}

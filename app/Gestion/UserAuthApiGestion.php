<?php


namespace App\Gestion;


use GuzzleHttp;
use GuzzleHttp\Exception\GuzzleException;

class UserAuthApiGestion
{
    const USER =  "utilisateurultrasecretdelapi";
    const PASSWORD = "motdepasseultrascretdelapi";
    const API_PATH = "http://127.0.0.1:8080/auth";

    static function authenticate()
    {
        /*return json_decode(
            file_get_contents(
                self::API_PATH, false,
                stream_context_create(array(
                    'http' => array(
                        'method' => 'POST',
                        'header' => 'Content-Type: application/x-www-form-urlencoded',
                        'content' => http_build_query(
                            array(
                                'username' => self::USER,
                                'password' => self::PASSWORD
                            )
                        )
                    )
                )
            ))
        );*/

        // Initialize Guzzle client
        $client = new GuzzleHttp\Client();

        // Create a POST request
        try {
            $response = $client->request(
                'POST',
                self::API_PATH,
                [
                    'form_params' => [
                        'user' => self::USER,
                        'password' => self::PASSWORD
                    ]
                ]
            );
            // Parse the response object, e.g. read the headers, body, etc.
            $headers = $response->getHeaders();
            $body = $response->getBody();

            // Output headers and body for debugging purposes
            var_dump($headers, $body);
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        }

        die;
    }
}

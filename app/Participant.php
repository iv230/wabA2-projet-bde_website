<?php

namespace App;

use App\Gestion\APIRequestGestion;
use App\Gestion\UserAuthApiGestion;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    private $token;

    public function __construct()
    {
        try
        {
            $this->token = UserAuthApiGestion::authenticate();

            if($this->token == null)
                throw new Exception('Couldn\'t get token');
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            exit();
        }
    }

    public function event()
    {
        return $this->hasOne('App\Event');
    }

    public function user()
    {
        $user = new User;
        $user = ApiModelHydrator::hydrate('App\User', APIRequestGestion::get('/users', $this->token, array('id' => $this->id_user))[0]);
        return $user;
    }
 }

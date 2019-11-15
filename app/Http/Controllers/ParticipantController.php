<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestion\UserAuthApiGestion;
use App\ApiModelHydrator;
use App\Gestion\APIRequestGestion;
use App\Participant as Participant;
use App\User as User;
use App\Events as Events;

class ParticipantController extends Controller
{
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

	public function index() {
		$participants = Participant::all();

        return view('participants.index', array('participants' => $participants));
	}

	public function show($id_event) {

		$participant = Participant::find($id_event);

		$user = new User();
        $user = ApiModelHydrator::hydrate('App\User', APIRequestGestion::get('/users', $this->token, array('id' => $participant->id_user))[0]);

		return view('participants.show', array('participant' => $participant, 'user' => $user));
	}

    public function isParticipating($id_user, $id_event) {
    	$participant = Participant::where('id_user', '=', $id_user, 'AND', 'id_event', '=', $id_event)->get();

    	return isset($participant);
    }

    public function createParticipant(Request $request) {
    	$participant = new Participant;
    	$participant -> id_event = $request -> input('idevent');
    	$participant -> id_user = $request -> input('iduser');

    	$participant -> save();

    	return redirect('publicevents/'.$participant->id_event);
    }
}

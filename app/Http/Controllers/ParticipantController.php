<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Gestion\UserAuthApiGestion;
use App\ApiModelHydrator;
use App\Gestion\APIRequestGestion;
use App\Participant as Participant;
use App\User as User;
use App\Events as Events;

class ParticipantController extends Controller
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

	public function index() {
		$participants = Participant::all();

        return view('participants.index', array('participants' => $participants));
	}

	public function show($id_event) {

		$participants = Participant::where('id_event', $id_event)->get();
		$event = Events::find($id_event);

		return view('participants.show', array('participants' => $participants, 'event' => $event));
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

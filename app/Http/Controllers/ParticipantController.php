<?php

namespace App\Http\Controllers;

use App\Http\Request\ParticipateRequest;
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

    /**
     * Displays a list of all participants for each events
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index() {
		$participants = Participant::all();

        return view('participants.index', array('participants' => $participants));
	}

    /**
     * Displays the list for an event
     *
     * @param $id_event
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function show($id_event) {

		$participants = Participant::where('id_event', $id_event)->get();
		$event = Events::find($id_event);

		return view('participants.show', array('participants' => $participants, 'event' => $event));
	}

    /**
     * Says if an user participates to an event
     *
     * @param $id_user
     * @param $id_event
     * @return bool
     */
    public function isParticipating($id_user, $id_event) {
    	//$participants = Participant::where('id_user', '=', $id_user, 'AND', 'id_event', '=', $id_event)->get();
        $participants = Participant::whereRaw('id_user =' . $id_user . ' and id_event=' . $id_event)->get();

    	return count($participants) >= 1;
    }

    /**
     * Make an user participate to an event
     *
     * @param ParticipateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createParticipant(ParticipateRequest $request) {
    	$participant = new Participant;
    	$participant -> id_event = $request -> input('id_event');
    	$participant -> id_user = $request -> input('id_user');

    	$participant -> save();

    	return redirect('publicevents/'.$participant->id_event);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events as Events;
use App\Comment as Comment;
use App\Participant as Participant;

class PublicEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        return view('publicevents.public_events_index', array('events' => $events));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Events::find($id);

        if (!isset($event))
            abort(404, 'Not Found - L\'évènement #' . $id . 'n\'existe pas.');

        $comments = Comment::where('id_event', $event->id);

        return view('publicevents.show', array('event' => $event), array('comments' => $comments));
    }
}

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
        $comments = Comment::all();
        return view('publicevents.show', array('event' => $event), array('comments' => $comments));
    }

    public function toggleFavorite($id) {
        $event = Events::find($id);//get the article based on the id
        Auth::user()->toggleFavorite($event);//add/remove the user from the favorite list
        return redirect::to('publicevents/{$id}');//redirect back (optionally with a message)
    }


}

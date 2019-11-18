<?php

namespace App\Http\Controllers;

use App\Gestion\FileUploadGestion;
use App\Http\Request\EventRequest;
use App\Image;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request)
    {

        $image = $request->file('photo');
        $extension = $image->getClientOriginalExtension();
        $picture_name = 'event_' . $event->id;

        FileUploadGestion::uploadFile($image, $picture_name, '/img/eventsUser');

        $path = '/img/eventsUser/' . $picture_name . '.' .$extension;

        $image = new Image;
        $image -> path = $path;
        $image -> save();

        $event -> image_id = $image->id;
        $event -> save();

        return redirect('publicevents/' . $event->id);
    }
}

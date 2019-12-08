<?php

namespace App\Http\Controllers;

use App\Comment as Comment;
use App\EventImage;
use App\Gestion\FileUploadGestion;
use App\Http\Request\EditEventRequest;
use App\Http\Request\HideEventRequest;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Request\EventRequest;
use App\Events as Events;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();
        return view('adminevents.events_index', array('events' => $events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminevents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Request\EventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $event = new Events;
        $event -> name = $request -> input('name');
        $event -> description = $request -> input('description');
        $event -> location = $request -> input('location');
        $event -> recurrence = $request -> input('recurrence');
        $event -> date_event = $request -> input('date_event');
        $event -> time_event = $request -> input('time');
        $event -> price = $request -> input('price');
        $event -> state = 1;
        $event -> save();

        $image = $request->file('photo');
        $extension = $image->getClientOriginalExtension();
        $picture_name = 'event_' . $event->id;

        FileUploadGestion::uploadFile($image, $picture_name, '/img/events');

        $path = '/img/events/' . $picture_name . '.' .$extension;

        $image = new Image;
        $image -> path = $path;
        $image -> save();

        $event -> image_id = $image->id;
        $event -> save();

        return redirect('adminevents/' . $event->id);
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

        $comments = Comment::where('id_event', $event->id)->get();
        $event_images = EventImage::where('id_event', $event->id)->get();

        $images = [];

        foreach ($event_images as $event_image) {
            $image = Image::find($event_image->id_image);
            array_push($images, $image);
        }

        $likeController = new LikeController();
        $likeCount = $likeController->countLikes($id);

        return view('adminevents.show', array('event' => $event, 'comments' => $comments, 'images' => $images, 'likeCount' => $likeCount));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::find($id);
        return view('adminevents.edit', array('event' => $event));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditEventRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEventRequest $request, $id)
    {
        $event = Events::find($id);
        $event -> name = $request -> input('name');
        $event -> description = $request -> input('description');
        $event -> location = $request -> input('location');
        $event -> recurrence = $request -> input('recurrence');
        $event -> date_event = $request -> input('date_event');
        $event -> price = $request -> input('price');
        $event -> state = $request -> input('state');

        $event -> save();

        $image = $request->file('photo');

        if (isset($image)) {
            $extension = $image->getClientOriginalExtension();
            $picture_name = 'event_' . $event->id;

            FileUploadGestion::uploadFile($image, $picture_name, '/img/events');

            $path = '/img/events/' . $picture_name . '.' .$extension;

            $image = new Image;
            $image -> path = $path;
            $image -> save();

            $event -> image_id = $image->id;
            $event -> save();
        }

        return redirect('adminevents/' . $event->id);
    }

    /**
     * Set an event as hidden or not
     *
     * @param HideEventRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hide(HideEventRequest $request, $id)
    {
        $event = Events::find($id);

        $action = $request->input('action');

        $event->hidden = $action;
        $event->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Events::find($id);
        $event -> destroy($id);
        return redirect('adminevents');
    }
}

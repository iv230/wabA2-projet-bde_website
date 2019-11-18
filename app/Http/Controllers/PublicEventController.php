<?php

namespace App\Http\Controllers;

use App\EventImage;
use App\Gestion\FileUploadGestion;
use App\Http\Request\EventRequest;
use App\Http\Request\PostPhotoRequest;
use App\Image;
use Illuminate\Http\Request;
use App\Events as Events;
use App\Comment as Comment;
use App\Participant as Participant;
use function Sodium\crypto_pwhash_scryptsalsa208sha256;

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

        $comments = Comment::where('id_event', $event->id)->get();
        $event_images = EventImage::where('id_event', $event->id)->get();

        $images = [];

        foreach ($event_images as $event_image) {
            $image = Image::find($event_image->id_image);
            array_push($images, $image);
        }

        $likeController = new LikeController();
        $likeCount = $likeController->countLikes($id);

        return view('publicevents.show', array('event' => $event, 'comments' => $comments, 'images' => $images, 'likeCount' => $likeCount));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(PostPhotoRequest $request)
    {
        $eventId = $request->input('id_event');
        $event = Events::find($eventId);

        $imageFile = $request->file('photo');
        $extension = $imageFile->getClientOriginalExtension();
        $picture_name = $imageFile->hashName();

        dump($picture_name);

        FileUploadGestion::uploadFile($imageFile, $picture_name, '/img/eventsUser');

        $path = '/img/eventsUser/' . $picture_name . '.' .$extension;

        $image = new Image;
        $image -> path = $path;
        $image -> save();

        $image_event = new EventImage;
        $image_event -> id_event = $event->id;
        $image_event -> id_image = $image->id;
        $image_event -> save();

        return redirect('publicevents/' . $event->id);
    }
}

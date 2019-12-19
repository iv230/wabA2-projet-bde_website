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

class PublicEventController extends Controller
{
    public function __construct()
    {
        //$this->middleware('App\Http\Middleware\ShowEvent:id')->only(['show']);
    }


    /**
     * Redirect to index, sorted view or specific event
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function route(Request $request) {
        $name = $request->input('eventName');
        $sort = $request->input('sort');

        if ($name != null) {
            return $this->showName($name);
        } elseif ($sort != null) {
            return $this->sort($sort);
        } else {
            return $this->index();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $events = Events::all();

        $passedEvents = [];
        $monthEvents = [];
        $nextEvents = [];

        $date = date('Y-m-d', strtotime(" +1 months"));
        $timestamp = strtotime($date);

        foreach ($events as $event) {
            if ($event->state == 0) {
                array_push($passedEvents, $event);
            } else {
                $eventTimestamp = strtotime($event->date_event);

                if ($eventTimestamp < $timestamp) {
                    array_push($monthEvents, $event);
                } else {
                    array_push($nextEvents, $event);
                }
            }
        }

        return view(
            'publicevents.public_events_index',
            array('passedEvents' => $passedEvents, 'monthEvents' => $monthEvents, 'nextEvents' => $nextEvents)
        );
    }

    /**
     * Returns all events sorted
     *
     * @param $sort
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sort($sort) {
        switch ($sort) {
            case 1:
                $events = Events::all();

                $sorted = array();

                foreach ($events as $event) {
                    array_push($sorted, $event);
                }

                usort($sorted, function($a, $b) {
                    return $a->price > $b->price;
                });

                return view('publicevents.sorted_index', array('events' => $sorted));
                break;

            case 2:
                $events = Events::all();

                $sorted = array();

                foreach ($events as $event) {
                    array_push($sorted, $event);
                }

                usort($sorted, function($a, $b) {
                    return $a->price < $b->price;
                });

                return view('publicevents.sorted_index', array('events' => $sorted));
                break;

            default:
                return $this->index();
        }
    }

    /**
     * Redirect to the event with specified name
     *
     * @param $name
     * @return @mixed
     */
    public function showName($name) {
        $event = Events::query()->where('name', $name)->get();

        if (!$event) {
            return $this->index();
        }

        return redirect("/publicevents/" . $event[0]->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param PostPhotoRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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

<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('events.index', array('events' => $events));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Events;
        $event -> name = $request -> input('name');
        $event -> description = $request -> input('description');
        $event -> location = $request -> input('location');
        $event -> recurrence = $request -> input('recurrence');
        $event -> date_event = $request -> input('date_event');
        $event -> price = $request -> input('price');
        $event -> state = 1;

        $event -> save();

        return("New Event added");
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
        return view('events.show', array('event' => $event));
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
        return view('events.edit', array('event' => $event));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        return("Event updated");
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
        return redirect('events');
    }
}

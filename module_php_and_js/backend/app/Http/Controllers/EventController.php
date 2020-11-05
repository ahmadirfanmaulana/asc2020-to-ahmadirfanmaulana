<?php

namespace App\Http\Controllers;

use App\Event;
use App\Organizer;
use Illuminate\Http\Request;
use Validator;

class EventController extends Controller
{
    function __construct (Event $event, Organizer $organizer) {
        $this->event = $event;
        $this->organizer = $organizer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // define organizer
        $organizer = auth()->user();

        // get all events
        $events = $this->event->where('organizer_id', $organizer->id)->get();

        // return view
        return view('event.index', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // define organizer
        $organizer = auth()->user();

        // define event
        $event = $this->event->where('id', $id)->first();

        // return view
        return view('event.show', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

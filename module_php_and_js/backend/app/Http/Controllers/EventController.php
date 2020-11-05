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

    public function create(Request $request)
    {
        // define organizer
        $organizer = auth()->user();

        // return view
        return view('event.create');
    }

    public function store (Request $request) {

        // define organizer
        $organizer = auth()->user();

        // validator
        $validator = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|regex:/^[0-9a-z-]+$/|unique:events,slug',
            'date' => 'required|date_format:Y-m-d',
        ]);

        // insert
        $insert = $this->event->create([
            'organizer_id' => $organizer->id,
            'name' => $request->name,
            'slug' => $request->slug,
            'date' => $request->date,
        ]);

        // redirect success
        return redirect()->route('events.show', ['event' => $insert->id])->with('message', 'Event successfully created');

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
        // define organizer
        $organizer = auth()->user();

        // define event
        $event = $this->event->where('id', $id)->first();

        // return view
        return view('event.edit', [
            'event' => $event,
        ]);
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
        // define event
        $event = $this->event->find($id);

        // define organizer
        $organizer = auth()->user();

        // validator
        $validator = $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|regex:/^[0-9a-z-]+$/|unique:events,slug,' . $event->id,
            'date' => 'required|date_format:Y-m-d',
        ]);

        // insert
        $update = $event->update([
            'organizer_id' => $organizer->id,
            'name' => $request->name,
            'slug' => $request->slug,
            'date' => $request->date,
        ]);

        // redirect success
        return redirect()->route('events.show', ['event' => $event->id])->with('message', 'Event successfully updated');
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

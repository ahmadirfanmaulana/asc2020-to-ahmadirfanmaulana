<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Event;
use App\Organizer;
use App\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    function __construct (Event $event, Organizer $organizer, Channel $channel, Session $session) {
        $this->event = $event;
        $this->organizer = $organizer;
        $this->channel = $channel;
        $this->session = $session;
    }

    //
    public function create(Request $request, $event_id)
    {
        // define organizer
        $organizer = auth()->user();

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // return view
        return view('session.create', [
            'event' => $event,
        ]);
    }

    public function store (Request $request, $event_id) {

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // validator
        $validator = $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'room' => 'required',
            'start' => 'required|date_format:Y-m-d H:i:s',
            'end' => 'required|date_format:Y-m-d H:i:s',
            'description' => 'required',
        ]);

        $session = $this->session->where('room_id', $request->room)
            ->where('start', '<', $request->start)
            ->where('end', '>', $request->start)
            ->first();

        if ($session)
            return redirect()->back()->withErrors(['room' => 'Room already booked during this time'])->withInput($request->all());

        $session = $this->session->where('room_id', $request->room)
            ->where('start', '<', $request->end)
            ->where('end', '>', $request->end)
            ->first();

        if ($session)
            return redirect()->back()->withErrors(['room' => 'Room already booked during this time'])->withInput($request->all());

        // insert
        $insert = $this->session->create([
            'type' => $request->type,
            'title' => $request->title,
            'speaker' => $request->speaker,
            'room_id' => $request->room,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description,
            'cost' => $request->cost ? $request->cost : 0,
        ]);

        // redirect success
        return redirect()->route('events.show', ['event' => $event->id])->with('message', 'Session successfully created');

    }

    //
    public function edit(Request $request, $event_id, $session_id)
    {
        // define organizer
        $organizer = auth()->user();

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // define session
        $session = $this->session->find($session_id);

        // return view
        return view('session.edit', [
            'event' => $event,
            'session' => $session,
        ]);
    }

    public function update (Request $request, $event_id, $session_id) {

        // define session
        $session = $this->session->where('id', $session_id)->first();

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // session already booked
        $session = $this->session->where('room_id', $request->room)
            ->where('start', '<', $request->start)
            ->where('end', '>', $request->start)
            ->first();

        // validate session already booked
        if ($session)
            return redirect()->back()->withErrors(['room' => 'Room already booked during this time'])->withInput($request->all());

        // session already booked
        $session = $this->session->where('room_id', $request->room)
            ->where('start', '<', $request->end)
            ->where('end', '>', $request->end)
            ->first();

        // validate session already booked
        if ($session)
            return redirect()->back()->withErrors(['room' => 'Room already booked during this time'])->withInput($request->all());

        // validator
        $validator = $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'room' => 'required',
            'start' => 'required|date_format:Y-m-d H:i:s',
            'end' => 'required|date_format:Y-m-d H:i:s',
            'description' => 'required',
        ]);

        // insert
        $update = $session->update([
            'type' => $request->type,
            'title' => $request->title,
            'speaker' => $request->speaker,
            'room_id' => $request->room,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description,
            'cost' => $request->cost ? $request->cost : 0,
        ]);

        // redirect success
        return redirect()->route('events.show', ['event' => $event->id])->with('message', 'Session successfully updated');

    }
}

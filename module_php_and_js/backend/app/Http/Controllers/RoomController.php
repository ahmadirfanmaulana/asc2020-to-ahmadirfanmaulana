<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Event;
use App\Organizer;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    function __construct (Event $event, Organizer $organizer, Channel $channel, Room $room) {
        $this->event = $event;
        $this->organizer = $organizer;
        $this->channel = $channel;
        $this->room = $room;
    }

    public function create(Request $request, $event_id)
    {
        // define organizer
        $organizer = auth()->user();

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // return view
        return view('room.create', [
            'event' => $event,
        ]);
    }

    public function store (Request $request, $event_id) {

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // validator
        $validator = $this->validate($request, [
            'name' => 'required',
            'channel' => 'required',
            'capacity' => 'required|numeric',
        ]);

        // insert
        $insert = $this->room->create([
            'channel_id' => $request->channel,
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        // redirect success
        return redirect()->route('events.show', ['event' => $event->id])->with('message', 'Room successfully created');

    }

    public function capacity ($event_id) {
        // define organizer
        $organizer = auth()->user();

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // return view
        return view('room.capacity', [
            'event' => $event,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Event;
use App\Organizer;
use Illuminate\Http\Request;
use Validator;

class ChannelController extends Controller
{
    //
    function __construct (Event $event, Organizer $organizer, Channel $channel) {
        $this->event = $event;
        $this->organizer = $organizer;
        $this->channel = $channel;
    }

    public function create(Request $request, $event_id)
    {
        // define organizer
        $organizer = auth()->user();

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // return view
        return view('channel.create', [
            'event' => $event,
        ]);
    }

    public function store (Request $request, $event_id) {

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // validator
        $validator = $this->validate($request, [
           'name' => 'required',
        ]);

        // insert
        $insert = $this->channel->create([
            'event_id' => $event_id,
            'name' => $request->name,
        ]);

        // redirect success
        return redirect()->route('events.show', ['event' => $event->id])->with('message', 'Channel successfully created');

    }
}

<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Event;
use App\EventTicket;
use App\Organizer;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    function __construct (Event $event, Organizer $organizer, Channel $channel, EventTicket $eventTicket) {
        $this->event = $event;
        $this->organizer = $organizer;
        $this->channel = $channel;
        $this->eventTicket = $eventTicket;
    }

    public function create(Request $request, $event_id)
    {
        // define organizer
        $organizer = auth()->user();

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // return view
        return view('ticket.create', [
            'event' => $event,
        ]);
    }

    public function store (Request $request, $event_id) {

        // define event
        $event = $this->event->where('id', $event_id)->first();

        // validator
        $validator = $this->validate($request, [
            'name' => 'required',
            'cost' => 'required',
        ]);

        // define special validity
        $special_validity = null;
        if ($request->special_validity) {
            $special_validity = [];
            $special_validity['type'] = $request->special_validity;
            $special_validity[$request->special_validity] = $request[$request->special_validity];
            $special_validity = json_encode($special_validity);
        }

        // insert
        $insert = $this->eventTicket->create([
            'event_id' => $event_id,
            'name' => $request->name,
            'cost' => $request->cost,
            'special_validity' => $special_validity,
        ]);

        // redirect success
        return redirect()->route('events.show', ['event' => $event->id])->with('message', 'Ticket successfully created');

    }
}

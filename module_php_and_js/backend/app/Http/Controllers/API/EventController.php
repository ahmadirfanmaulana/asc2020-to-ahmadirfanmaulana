<?php

namespace App\Http\Controllers\API;

use App\Event;
use App\Http\Controllers\Controller;
use App\Organizer;
use Illuminate\Http\Request;
use Validator;

class EventController extends Controller
{
    //
    function __construct (Event $event, Organizer $organizer) {
        $this->event = $event;
        $this->organizer = $organizer;
    }

    public function index () {
        // get all events
        $events = $this->event->with(['organizer'])->get();


        // response success
        return response()->json(['events' => $events], 200);
    }

    public function show ($organizer_slug, $event_slug) {
        // define organizer
        $organizer = $this->organizer->where('slug', $organizer_slug)->first();

        // organizer not found
        if (!$organizer)
            return response()->json([
                'message' => 'Organizer not found',
            ], 404);

        // define event
        $event = $this->event
            ->where('organizer_id', $organizer->id)
            ->where('slug', $event_slug)
            ->with(['channels' => function ($channel) {
            $channel->with(['rooms' => function($room) {
                $room->with(['sessions'])->get();
            }])->get();
        }, 'tickets'])->first();

        // event not found
        if (!$event)
            return response()->json([
                'message' => 'Event not found',
            ], 404);

        // response success
        return response()->json($event, 200);

    }
}

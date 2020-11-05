<?php

namespace App\Http\Controllers\API;

use App\Attendee;
use App\Event;
use App\EventTicket;
use App\Http\Controllers\Controller;
use App\Organizer;
use App\Registration;
use App\SessionRegistration;
use Carbon\Carbon;
use Facade\Ignition\Tests\Support\Models\Car;
use Illuminate\Http\Request;
use Validator;

class RegistrationController extends Controller
{
    //
    function __construct (Attendee $attendee, EventTicket $eventTicket, Event $event, Organizer $organizer, Registration $registration, SessionRegistration $sessionRegistration) {
        $this->event = $event;
        $this->organizer = $organizer;
        $this->registration = $registration;
        $this->sessionRegistration = $sessionRegistration;
        $this->attendee = $attendee;
        $this->eventTicket = $eventTicket;
    }

    // get all registration
    public function index (Request $request) {
        // define user
        $user = $this->attendee->where('login_token', $request->token)->first();

        // registrations
        $registrations = $user->registrations->map(function ($registration) {
            return [
                'event' => $registration->ticket->event()->with(['organizer'])->first(),
                'session_ids' => $registration->session_registrations->map(function($sr) {
                    return $sr->id;
                }),
            ];
        });

        // response success
        return response()->json(['registrations' => $registrations], 200);

    }

    // register event
    public function store (Request $request, $organizer_slug, $event_slug) {
        // define user
        $user = $this->attendee->where('login_token', $request->token)->first();

        // validator
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required|numeric',
            'session_ids' => 'array',
        ]);

        // validator fails
        if ($validator->fails())
            return response()->json([
                'message' => 'Invalid fields',
                'errors' => $validator->errors(),
            ], 401);

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

        // user register
        $registration = $this->registration
            ->where('ticket_id', $request->ticket_id)
            ->where('attendee_id', $user->id)->first();

        // user already registered
        if ($registration)
            return response()->json([
                'message' => 'User already registered',
            ], 401);

        // define ticket
        $ticket = $this->eventTicket->find($request->ticket_id);

        // ticket not available anymore
        if (!$ticket->available)
            return response()->json([
                'message' => 'Ticket is no longer available',
            ], 401);

        // register ticket
        $registration = $this->registration->create([
            'attendee_id' => $user->id,
            'ticket_id' => $request->ticket_id,
            'registration_time' => Carbon::now(),
        ]);

        // register session
        if ($request->session_ids) {
            foreach ($request->session_ids as $session_id) {
                $sessionRegistration = $this->sessionRegistration->create([
                    'registration_id' => $registration->id,
                    'session_id' => $session_id,
                ]);
            }
        }

        // response success
        return response()->json([
            'message' => 'Registration successful'
        ], 200);

    }
}

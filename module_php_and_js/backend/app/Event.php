<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    protected $hidden = ['organizer_id'];

    public function channels () {
        return $this->hasMany(Channel::class);
    }

    public function rooms () {
        return $this->hasManyThrough(Room::class, Channel::class);
    }

    public function sessions () {
        return $this->channels->map(function ($channel) {
            return $channel->sessions;
        })->flatten()->all();
    }

    public function tickets () {
        return $this->hasMany(EventTicket::class);
    }

    public function organizer () {
        return $this->belongsTo(Organizer::class);
    }

    public function registrations () {
        return $this->hasManyThrough(Registration::class, EventTicket::class, 'event_id', 'ticket_id');
    }

    public function dateDisplay () {
        return date('F j, Y', strtotime($this->date));
    }
}

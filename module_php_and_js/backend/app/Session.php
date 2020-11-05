<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['room_id'];

    public function getCostAttribute ($value) {
        if ($value != null)
           return (int) $value;

        return $value;
    }

    public function startTime () {
        return date('H:i', strtotime($this->start));
    }

    public function endTime () {
        return date('H:i', strtotime($this->end));
    }

    public function room () {
        return $this->belongsTo(Room::class);
    }

    public function session_registrations () {
        return $this->hasMany(SessionRegistration::class);
    }
}


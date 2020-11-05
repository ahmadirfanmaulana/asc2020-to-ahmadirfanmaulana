<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    public function ticket () {
        return $this->belongsTo(EventTicket::class, 'ticket_id', 'id');
    }

    public function session_registrations () {
        return $this->hasMany(SessionRegistration::class);
    }
}

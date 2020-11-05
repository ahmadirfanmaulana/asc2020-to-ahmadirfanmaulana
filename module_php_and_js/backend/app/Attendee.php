<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    protected $hidden = ['login_token', 'id', 'registration_code'];

    public function registrations () {
        return $this->hasMany(Registration::class);
    }
}

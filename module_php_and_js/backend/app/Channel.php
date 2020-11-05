<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['event_id'];

    public function rooms () {
        return $this->hasMany(Room::class);
    }

    public function sessions () {
        return $this->hasManyThrough(Session::class, Room::class);
    }
}

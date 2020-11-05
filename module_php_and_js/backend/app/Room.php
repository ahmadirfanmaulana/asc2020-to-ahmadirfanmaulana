<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['channel_id', 'capacity'];

    public function sessions () {
        return $this->hasMany(Session::class);
    }

    public function channel () {
        return $this->belongsTo(Channel::class);
    }
}

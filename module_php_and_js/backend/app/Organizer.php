<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Organizer extends Authenticatable
{
    use Notifiable;
    //
    protected $guarded = [];
    public $timestamps = false;

    protected $hidden = [
        'password_hash', 'email'
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }
}

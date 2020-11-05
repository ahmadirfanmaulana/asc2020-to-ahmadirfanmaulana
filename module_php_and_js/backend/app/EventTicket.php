<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTicket extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    protected $hidden = ['event_id', 'special_validity', 'event', 'registrations'];
    protected $appends = ['description', 'available'];

    public function getDescriptionAttribute() {
        $result = null;

        if ($this->special_validity) {
            $special_validity = json_decode($this->special_validity);

            if ($special_validity->type == 'date') {
                $result = "Available until " . date('F j, Y', strtotime($special_validity->date));
            } else {
                $result = $special_validity->amount . ' tickets available';
            }
        }

        return $result;
    }

    public function event () {
        return $this->belongsTo(Event::class);
    }

    public function registrations () {
        return $this->hasMany(Registration::class, 'ticket_id', 'id');
    }

    public function getAvailableAttribute () {
        $available = true;

        if (date('Y-m-d') > $this->event->date) {
            $available = false;
        }

        if ($this->special_validity) {
            $special_validity = json_decode($this->special_validity);

            if ($special_validity->type == 'date' && date('Y-m-d') > $special_validity->date) {
                $available = false;
            }

            if ($special_validity->type == 'amount' && $this->registrations->count() >= $special_validity->amount) {
                $available = false;
            }
        }

        return $available;
    }

    public function getCostAttribute ($value) {
        if ($value != null)
            return (int) $value;

        return $value;
    }
}

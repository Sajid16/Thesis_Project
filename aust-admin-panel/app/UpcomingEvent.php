<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpcomingEvent extends Model
{
    protected $table = 'upcoming_events';

    public function event() {
        return $this->belongsTo('App\Event','eventId','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected  $table = "announcements";

    public function department() {
        return $this->belongsTo('App\Department','deptId', 'id');
    }
}

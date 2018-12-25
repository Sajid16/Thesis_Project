<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumnis";

    public function department() {
        return $this->belongsTo('App\Department','deptID', 'id');
    }
}

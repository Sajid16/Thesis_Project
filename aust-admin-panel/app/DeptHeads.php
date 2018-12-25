<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeptHeads extends Model
{
    protected $table = "dept_heads";

    public function department() {
        return $this->belongsTo('App\Department','deptID', 'id');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class austLivesController extends Controller
{
    //
    public function austLife() {
        $stories =DB::table('austlives')
        ->get();
        return view('aust-life',compact('stories'));
    }
}

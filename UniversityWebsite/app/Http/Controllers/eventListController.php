<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AdminMenu;
class eventListController extends Controller
{
    //
    public function getEventData(){
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;

        $data=  DB::table('events')
        ->join('upcoming_events','events.id','=','upcoming_events.eventId')
        ->select('events.*','upcoming_events.*')
        ->paginate(8);
        return view('eventList',compact('data','homearray'));
    }
}

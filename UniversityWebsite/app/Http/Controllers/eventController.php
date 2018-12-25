<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;
class eventController extends Controller
{
    //
    public function getEventData($id){
        
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;

        $query1=  DB::table('events')
        ->join('upcoming_events','events.id','=','upcoming_events.eventId')
        ->where('events.id',$id)->get();
    
    
        $query2=  DB::table('event_docs')
        ->join('events','events.id','=','event_docs.eventId')
        ->select('events.*','event_docs.*')
        ->where('events.id',$id)->get();
    
    
        $arr = [];
        $arr['query1'] =$query1 ;
        $arr['query2'] =$query2;
    
          return view('event',compact('arr','homearray'));
    
        }
}

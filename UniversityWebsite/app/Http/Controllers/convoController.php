<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;
class convoController extends Controller
{
    //
    public function getConvoData(){
        
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;

        $query1=  DB::table('events')
        ->join('upcoming_events','events.id','=','upcoming_events.eventId')
        ->where([['events.eventTitle','LIKE','%convocation%'],['events.validity','=','yes']])
        ->orwhere([['events.eventTitle','LIKE','%Convocation%'],['events.validity','=','yes']])
        ->get();
    
        $query2=  DB::table('event_docs')
        ->join('events','event_docs.eventId','=','events.id')
        ->where([['events.eventTitle','LIKE','%convocation%'],['events.validity','=','yes']])
        ->orwhere([['events.eventTitle','LIKE','%Convocation%'],['events.validity','=','yes']])
        ->get();

    
    
        $arr = [];
        $arr['query1'] =$query1 ;
        $arr['query2'] =$query2;
    
          return view('convo',compact('arr','homearray'));
    
        }
}

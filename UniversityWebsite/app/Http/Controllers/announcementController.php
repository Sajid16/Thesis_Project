<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AdminMenu;
class announcementController extends Controller
{
    //
    public function getAnnouncementData($id){
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;
        $data=  DB::table('announcements')
        ->join('departments','departments.id','=','announcements.deptId')
        ->where('announcements.id','=',$id)->get();

        return view('announcement',compact('data','homearray'));
    }
}

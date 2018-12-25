<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AdminMenu;

class announcementListController extends Controller
{
    //
    public function getAnnouncementData(){
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;
        $data=  DB::table('announcements')
        ->join('departments','departments.id','=','announcements.deptId')
        ->select('departments.*','announcements.*')
        ->paginate(10);
        return view('announcementList',compact('data','homearray'));
    }
}

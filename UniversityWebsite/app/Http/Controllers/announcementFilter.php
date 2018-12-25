<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\AdminMenu;
class announcementFilter extends Controller
{
    //
    public function getAnnouncementFilterData($filter){
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;
       
        if($filter == 'all'){
         $data=  DB::table('announcements')
         ->join('departments','departments.id','=','announcements.deptId')
         ->select('departments.*','announcements.*')
         ->where('departments.deptName','=','ALL')
         ->paginate(10);
        }
         
        if($filter == 'date'){
         $data=  DB::table('announcements')
         ->join('departments','departments.id','=','announcements.deptId')
         ->select('departments.*','announcements.*')
         ->orderBy('announcements.postDate','desc')
         ->paginate(10);
        }
        
        if($filter == 'dept'){
         $data=  DB::table('announcements')
         ->join('departments','departments.id','=','announcements.deptId')
         ->select('departments.*','announcements.*')
         ->where('departments.deptName','<>','ALL')
         ->paginate(10);
        }
       
         return view('announcementFilter',compact('data','homearray'));
     }
}

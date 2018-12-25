<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\NewsAnnouncement;
use App\DeptHead;
use App\AdminMenu;


class DepartmentController extends Controller
{
    public function department($id)
    {
      // echo $id;
      $departments = DB::table('departments')->where('id','<>','0')->get();
      $admin_menu = AdminMenu::all();
      $homearray = [];
      $homearray['departments'] = $departments;
      $homearray['admin_menu'] = $admin_menu;

      $dept = DB::table('departments')->where('id',$id)->get();
      $deptnews = DB::table('announcements')
                  ->where('deptId',$id)
                  ->orderBy('postDate', 'desc')
                  ->get();
      $data =  DB::table('events')
                  ->join('upcoming_events','events.id','=','upcoming_events.eventId')
                  ->select('events.*','upcoming_events.*')
                  ->paginate(4);
      $depthead = DB::table('dept_heads')->where('deptID',$id)->get();

      $semester =DB::table('semesters')->where('deptID',$id)->get();

      $data1=  DB::table('announcements')
        ->join('departments','departments.id','=','announcements.deptId')
        ->where('announcements.id','=',$id)->get();

      $departmentarray = [];
      $departmentarray['dept'] = $dept;
      $departmentarray['deptnews'] = $deptnews;
      $departmentarray['depthead'] = $depthead;
      $departmentarray['data'] = $data;
      $departmentarray['semester'] =$semester;
      $departmentarray['data1'] =$data1;

      return View('Department', compact('departmentarray','homearray'));
    }
}

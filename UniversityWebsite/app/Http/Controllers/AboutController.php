<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\AdminMenu;
use DB;

class AboutController extends Controller
{
    public function about($id){
      // echo $id;
      $departments = DB::table('departments')->where('id','<>','0')->get();
      $admin_menu = AdminMenu::all();
      $homearray = [];
      $homearray['departments'] = $departments;
      $homearray['admin_menu'] = $admin_menu;
      $dept = DB::table('departments')->where('id',$id)->get();
      $departmentarray = [];
      $departmentarray['dept'] = $dept;
      return View('AboutDepartment', compact('homearray','departmentarray'));
      // return View('AboutDepartment');


    }
}

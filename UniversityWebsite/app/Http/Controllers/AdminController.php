<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\AdminMenu;
use DB;

class AdminController extends Controller
{
    public function admin($id){
      // echo $id;
      $departments = DB::table('departments')->where('id','<>','0')->get();
      $admin_menu = AdminMenu::all();
      $adminName = DB::table('admin_menus')->where('id',$id)->get();
      $adminMember = DB::table('employees')
                    ->join('admin_categories', 'employees.id', '=', 'admin_categories.employeeID')
                    ->join('employee_positions', 'employees.positionID', '=', 'employee_positions.id')
                    ->orderBy('employees.positionID', 'asc')
                    ->where('adminCategoryID',$id)
                    ->get();
      $homearray = [];
      $homearray['departments'] = $departments;
      $homearray['admin_menu'] = $admin_menu;
      $homearray['adminName'] = $adminName;
      return View('Admin', compact('homearray','adminMember'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\AdminMenu;
use App\Employee;
use DB;

class FacultyController extends Controller
{
    public function faculty($id){
      $departments = DB::table('departments')->where('id','<>','0')->get();
      $admin_menu = AdminMenu::all();
      $homearray = [];
      $homearray['departments'] = $departments;
      $homearray['admin_menu'] = $admin_menu;
      $dept = DB::table('departments')->where('id',$id)->get();
      $facultymember = DB::table('employees')
                      // ->join('employees', 'employees.positionID', '=', 'employee_positions.id')
                      ->Join('employee_positions', 'employee_positions.id', '=', 'employees.positionID')
                      // ->select('employees.*', 'employee_positions.*')
                      ->orderBy('employees.positionID', 'asc')
                      ->select('employees.*','employee_positions.positionName')
                      ->where('employees.deptID',$id)
                      ->get();
      return View('FacultyMember', compact('homearray','facultymember','dept'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\AdminMenu;
use App\Employee;
use DB;

class AlumniController extends Controller
{
    public function alumni(){
      $alumni = DB::table('alumnis')
                    ->join('departments', 'alumnis.deptID', '=', 'departments.id')
                    ->orderBy('alumnis.passingYear', 'desc')
                    ->get();
      $departments = DB::table('departments')->where('id','<>','0')->get();
      $admin_menu = AdminMenu::all();
      $homearray = [];
      $homearray['departments'] = $departments;
      $homearray['admin_menu'] = $admin_menu;
      return View('Alumni', compact('alumni','homearray'));
      // return view('Alumni');
    }
}

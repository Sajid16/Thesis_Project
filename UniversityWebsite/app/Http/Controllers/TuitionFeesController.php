<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;

class TuitionFeesController extends Controller
{
    //
    public function tuitionfees()
      {
         $departments = DB::table('departments')->where('id','<>','0')->get();
         $admin_menu = AdminMenu::all();
        
         $homearray = [];
         $homearray['departments'] = $departments;
         $homearray['admin_menu'] = $admin_menu;

        $tuition = DB::table('tuition_fees')->get();
         return View('Tuitionfees', compact('homearray','tuition'));
     }
}

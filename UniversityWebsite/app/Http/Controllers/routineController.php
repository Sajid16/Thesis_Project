<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;

class routineController extends Controller
{
    //
    public function routine($id1,$id2){
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;

        $routine = DB::table('semesters')->where([
            ['deptID', '=', $id1],
            ['id', '=', $id2],
        ])->get();
        // echo $routine;
        return view('routinePDF',compact('routine','homearray'));
    }
    
}

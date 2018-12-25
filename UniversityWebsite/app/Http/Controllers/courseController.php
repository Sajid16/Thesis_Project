<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;
class courseController extends Controller
{
    //
    public function course($id1,$id2){

        // $course =DB::table('semesters')
        // ->where([['deptID','=',$id1],['id','=',$id2]])
        // ->get();
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;

        $course = DB::table('semesters')->where([
            ['deptID', '=', $id1],
            ['id', '=', $id2],
        ])->get();

        return view('coursePDF',compact('course','homearray'));
    }
}

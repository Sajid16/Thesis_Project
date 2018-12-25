<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;

class labmanualController extends Controller
{
    //
    public function labmanual($id1,$id2){
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;

        $labmanual = DB::table('semesters')->where([
            ['deptID', '=', $id1],
            ['id', '=', $id2],
        ])->get();
        return view('labManualPDF',compact('labmanual','homearray'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;


class generalController extends Controller
{
    //
    public function getGeneralData($page){
        $departments = DB::table('departments')->where('id','<>','0')->get();
        $admin_menu = AdminMenu::all();
        $homearray = [];
        $homearray['departments'] = $departments;
        $homearray['admin_menu'] = $admin_menu;

        if ($page =='calendar') {
            $general = DB::table('generals')->where('Tab_name','=','Academic calendar')->get();
            return view('GeneralPDF',compact('general','homearray'));
        }
        else if ($page =='rules') {
            $general = DB::table('generals')->where('Tab_name','=','Academic rules')->get();
            return view('GeneralPDF',compact('general','homearray'));
        }
        else if ($page =='grading'){
            $general = DB::table('generals')->where('Tab_name','=','Grading rules')->get();
            return view('GeneralPDF',compact('general','homearray'));
        }
        else{
            $general = DB::table('generals')->where('Tab_name','=','Vacancy')->get();
            return view('GeneralPDF',compact('general','homearray'));
        }
    }
}

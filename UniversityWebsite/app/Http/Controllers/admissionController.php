<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;

class admissionController extends Controller
{
    //
    public function getAdmissionData(){
        $departments = DB::table('departments')->where('id','<>','0')->get();
         $admin_menu = AdminMenu::all();
        
         $homearray = [];
         $homearray['departments'] = $departments;
         $homearray['admin_menu'] = $admin_menu;

         $AdmissionInfo1 = DB::table('admissions')
         ->where('Section','=','eng')
         ->get();

         $AdmissionInfo2 = DB::table('admissions')
         ->where('Section','=','ms')
         ->get();

         return View('Admission', compact('homearray','AdmissionInfo1','AdmissionInfo2'));
    }
}

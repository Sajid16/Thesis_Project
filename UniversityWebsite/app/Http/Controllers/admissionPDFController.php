<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AdminMenu;

class admissionPDFController extends Controller
{
    //
    public function getAdmissionData($id){
        $departments = DB::table('departments')->where('id','<>','0')->get();
         $admin_menu = AdminMenu::all();
        
         $homearray = [];
         $homearray['departments'] = $departments;
         $homearray['admin_menu'] = $admin_menu;

         $AdmissionInfo = DB::table('admissions')
         ->where('id',$id)
         ->get();
       
         return View('AdmissionPDF', compact('homearray','AdmissionInfo'));
    }
}

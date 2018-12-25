<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\NewsAnnouncement;
use App\DeptHead;
use App\AdminMenu;

class LibraryController extends Controller
{
   public function library(){
     $departments = DB::table('departments')->where('id','<>','0')->get();
     $admin_menu = AdminMenu::all();
     $homearray = [];
     $homearray['departments'] = $departments;
     $homearray['admin_menu'] = $admin_menu;
     $librarydet = DB::table('library_details')
                // ->join('library_images', 'library_details.id', '=', 'library_images.libraryID')
                ->get();
     $libraryimg = DB::table('library_images')
                // ->join('library_images', 'library_details.id', '=', 'library_images.libraryID')
                ->get();
     $libraryarray = [];
     $libraryarray['librarydet'] = $librarydet;
     $libraryarray['libraryimg'] = $libraryimg;
     return View('Library', compact('homearray','libraryarray'));
   }
}

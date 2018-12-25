<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\announcements;
use App\DeptHead;
use App\AdminMenu;

class HomeController extends Controller
{
     public function index()
      {
         $departments = DB::table('departments')->where('id','<>','0')->get();
         $admin_menu = AdminMenu::all();
         $news = DB::table('announcements')
                     ->orderBy('postDate', 'desc')
                     ->get();
         $achievement = DB::table('achievements')
                        ->orderBy('Date', 'desc')
                        ->paginate(3);
        
         $homearray = [];
         $homearray['departments'] = $departments;
         $homearray['admin_menu'] = $admin_menu;
         $homearray['news'] = $news;
         $homearray['achievement'] = $achievement;
         return View('Home', compact('homearray'));
     }
}

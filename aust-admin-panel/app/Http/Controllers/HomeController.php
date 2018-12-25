<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\AdminMenu;
use App\Alumni;
use App\Announcement;
use App\AustLife;
use App\Department;
use App\DeptHeads;
use App\Employee;
use App\EmployeePosition;
use App\Event;
use App\LibraryDetails;
use App\Semester;
use App\UpcomingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\AcceptHeader;

class HomeController extends Controller
{
    public function admin_login(Request $request) {
        $credentials = $request->only('email', 'password');

        echo $request->email;
        echo $request->password;

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        } else {
            echo "password wrong";
        }
    }

    public function dashboard($tab = 'faculty', Request $request) {

        $achievements = Achievement::all();
        $departments = Department::all();
        $semesters = Semester::all();
        $admin_menus = AdminMenu::all();
        $events = Event::all();
        $upcoming_events = UpcomingEvent::all();
        $employee_positions = EmployeePosition::all();
        $library_details = LibraryDetails::all();
        $austlives = AustLife::all();
        $announcements = Announcement::all();
        $deptHeads = DeptHeads::all();
        $employees = Employee::all();
        $alumnis = Alumni::all();
        $dept_heads = DeptHeads::all();

        $request->session()->forget('tab');
        $request->session()->put('tab',$tab);

        return view('dashboard', compact(['achievements', 'departments','semesters','admin_menus','events', 'upcoming_events','employee_positions','library_details','austlives','announcements','dept_heads','employees','alumnis']));
    }

    public function saveAchievement(Request $request) {
        $achievement = new Achievement();
        $achievement->Title = $request->title;

        if ($request->hasFile('image')) {
            $imageName =  $request->image->getClientOriginalName();
            request()->image->move(public_path(), $imageName);
            $achievement->titleImg = $imageName;

        }

        $achievement->description = $request->achievement_description;

        $achievement->Date = $request->achievement_date;

        $achievement->save();

        return redirect()->back();

    }

    public function updateAchievement(Request $request) {
        $achievement =  Achievement::find($request->achievement_id);
        $achievement->Title = $request->title;

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            request()->image->move(public_path(), $imageName);
            $achievement->titleImg = $imageName;

        }

        $achievement->description = $request->achievement_description;

        //$achievement->Date = $request->achievement_date;

        $achievement->save();

        return redirect()->back();
    }

    public function delete_achievement($id = null) {

            $achievement = Achievement::find($id);
            $achievement->delete();
            return redirect()->back();

    }

    public function save_department(Request $request) {

        $department = new Department();

        $department->deptName = $request->dept_name;
        $department->deptshortName = $request->dept_short_name;
        $department->aboutDept = $request->about_dept;

        $department->save();

        return redirect()->back();

    }

    public function save_adminMenu(Request $request) {
        $admin_menu = new AdminMenu();
        $admin_menu->adminMenuName = $request->admin_menu_name;
        $admin_menu->save();
        return redirect()->back();
    }

    public function save_library_details(Request $request) {
        $library_details = new LibraryDetails();
        $library_details->detailsHead = $request->head_detail_name;
        $library_details->description = $request->description_name;
        $library_details->save();
        return redirect()->back();
    }

    public function save_employee_position(Request $request) {
        $employee_position = new EmployeePosition();
        $employee_position->positionName = $request->employee_position_name;
        $employee_position->save();
        return redirect()->back();

    }

    public function save_update_event(Request $request) {
        if ($request->event_id) {
            $event = Event::find($request->event_id);
        } else {
            $event = new Event();
        }
        $event->eventTitle = $request->event_title_name;
        $event->description = $request->event_des_name;
        $event->regLink = $request->event_link_name;
        $event->pageLink = $request->event_page_link_name;
        $event->save();
        return redirect()->back();
    }

    public function delete_department($id = null) {
        $department = Department::find($id);
        $department->delete();
        return redirect()->back();
    }

    public function delete_library_details($id = null) {
        $library_details = LibraryDetails::find($id);
        $library_details->delete();
        return redirect()->back();
    }

    public function delete_up_events($id = null) {
        $upcomingEvent = UpcomingEvent::find($id);
        $upcomingEvent->delete();
        return redirect()->back();
    }

    public function delete_events($id = null) {
        $event = Event::find($id);
        DB::table('event_docs')->where('eventId',$id)->delete();
        DB::table('upcoming_events')->where('eventId',$id)->delete();
        $event->delete();
        return redirect()->back();
    }

    public function delete_adminMenu($id = null) {
        $admin_menu = AdminMenu::find($id);
        $admin_menu->delete();
        return redirect()->back();
    }

    public function delete_employee_position($id = null) {
        $employee_menu = EmployeePosition::find($id);
        $employee_menu->delete();
        return redirect()->back();
    }

    public function update_admin_menu(Request $request) {
        $admin_menu = AdminMenu::find($request->adminMenu_id);
        $admin_menu->adminMenuName = $request->admin_menu_name;
        $admin_menu->save();
        return redirect()->back();
    }

    public function update_library_details(Request $request) {
        $library_details = LibraryDetails::find($request->libraryDetail_id);
        $library_details->detailsHead = $request->head_detail_name;
        $library_details->description = $request->description_name;
        $library_details->save();
        return redirect()->back();
    }

    public function update_employee_position(Request $request) {
        $employee_position = EmployeePosition::find($request->employeePosition_id);
        $employee_position->positionName = $request->employee_position_name;
        $employee_position->save();
        return redirect()->back();
    }

    public function update_department(Request $request) {
        $department = Department::find($request->department_id);
        $department->deptName = $request->dept_name;
        $department->deptshortName = $request->dept_short_name;
        $department->aboutDept = $request->about_dept;
        $department->save();
        return redirect()->back();
    }

    public function delete_semester($id = null) {
        $semester = Semester::find($id);
        $semester->delete();
        return redirect()->back();
    }

    public function save_or_update_semester_doc(Request $request) {
        if($request->semester_id) $semester = Semester::find($request->semester_id);
        else $semester = new Semester();
        $semester->deptID = $request->department;
        $semester->semester_name = $request->semester_name;
        if ($request->hasFile('class_routine')) {
            $fileName = $request->class_routine->getClientOriginalName();
            request()->class_routine->move('D:\4th year 1st semester', $fileName);
            $semester->class_routine = $fileName;
        }
        if ($request->hasFile('lab_manual')) {
            $fileName = $request->lab_manual->getClientOriginalName();
            request()->lab_manual->move(public_path('pdf'), $fileName);
            $semester->lab_manual = $fileName;

        }
        if ($request->hasFile('courses')) {
            $fileName = $request->courses->getClientOriginalName();
            request()->courses->move(public_path('pdf'), $fileName);
            $semester->courses = $fileName;

        }

        $semester->save();

        return redirect()->back();


    }

    public function save_upcoming_event(Request $request) {

        if($request->event_id) $upcoming_event = UpcomingEvent::find($request->event_id);

        else $upcoming_event = new UpcomingEvent();

        $upcoming_event->eventId = $request->event;

        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            request()->image->move(public_path(), $imageName);
            $upcoming_event->eventImg = $imageName;
        }

        $upcoming_event->organizer = $request->organizer;
        $upcoming_event->validity = $request->validity;
        $upcoming_event->date = $request->event_date;

        $upcoming_event->save();

        return redirect()->back();

    }

    public function austLife() {
        $stories = Austlife::all();
        return view('aust-life',compact('stories'));
    }

    public function add_story(Request $request){
        $austlife = new Austlife();
        $austlife->name = $request->name;
        $austlife->title = $request->title;
        $austlife->story = $request->story;
        if ($request->hasFile('image')) {
            $imageName = request()->image->getClientOriginalExtension();
            request()->image->move(public_path(), $imageName);
            $austlife->image = $imageName;
        }
        $austlife->save();
        return redirect()->back();
    }

    public function delete_story ($id = null) {
        $story = Austlife::find($id);
        $story->delete();
        return redirect()->back();
    }

    public function save_announcement(Request $request) {

        if($request->announcement_id) $announcement = Announcement::find($request->announcement_id);

           else $announcement = new Announcement();

            $announcement->deptId = $request->department;
            $announcement->newsTitle = $request->title;

        if ($request->hasFile('pdf_file')) {
            $pdfName = request()->pdf_file->getClientOriginalName();
            request()->pdf_file->move(public_path(), $pdfName);
            $announcement->newsPDF = $pdfName;
        }
        if ($request->hasFile('news_image')) {
            $image = request()->news_image->getClientOriginalName();
            request()->news_image->move(public_path(), $image);
            $announcement->newsImg = $image;
        }

        $announcement->postDate = $request->post_date;
        $announcement->validity = $request->validity;
        $announcement->pageLink = $request->page_link;
        $announcement->description = $request->ann_description;

        $announcement->save();

        return redirect()->back();

    }

    public function delete_annoucement($id = null) {

        $announcement = Announcement::find($id)->delete();
        return redirect()->back();


    }

    // Alumni

    public function save_alumni(Request $request) {
        if($request->alumni_id){
            $alumni = Alumni::find($request->alumni_id);
            $alumni->deptID = $request->department;
            $alumni->studentID = $request->student_id;
            $alumni->Name = $request->student_name;
            $alumni->save();
        }
        else {
            $alumni = new Alumni();
            $alumni->deptID = $request->department;
            $alumni->studentID = $request->student_id;

            $alumni->Name = $request->student_name;
            $alumni->cgpa = $request->student_cgpa;
            $alumni->studentEmail = $request->student_email;
            $alumni->currentPosition = $request->student_position;
            $alumni->passingYear = $request->student_passing_year;
            $alumni->save();
        }

        return redirect()->back();
    }


    public function delete_alumni($id = null) {

        $alumni = Alumni::find($id)->delete();
        return redirect()->back();


    }

    // Employees Functions

    public function save_employee(Request $request) {

        if($request->employee_id) $employee = Employee::find($request->employee_id);
        else $employee = new Employee();

        $employee->positionID = $request->position;
        $employee->deptID = $request->department;
        $employee->Name = $request->name;
        $employee->Education = $request->education;
        $employee->	Experience = $request->experience;
        $employee->AreaofInterest = $request->area_interest;

        if ($request->hasFile('image')) {
            $image = request()->image->getClientOriginalName();
            request()->image->move(public_path(), $image);
            $employee->employeeImg = $image;
        }

        $employee->employeeEmail = $request->email;

        $employee->save();
        return redirect()->back();

    }

    public function update_employee() {

    }

    public function delete_employee($id = null) {
        DB::table('admin_categories')->where('employeeID',$id)->delete();
        $employee = Employee::find($id)->delete();
        return redirect()->back();
    }

    // Dept Heads

    public function save_deptHead(Request $request) {

        if ($request->dept_head_id) {
            $deptHead = DeptHeads::find($request->dept_head_id);
        }
        else {

            $deptHead = new DeptHeads();

        }
        $deptHead->deptID = $request->department;

        $deptHead->From = $request->head_from;

        $deptHead->To = $request->head_to;

        $deptHead->Name = $request->head_name;

        $deptHead->headMsg = $request->head_message;

        if ($request->hasFile('head_image')) {
        $image = request()->head_image->getClientOriginalName();
        request()->head_image->move(public_path(), $image);
        $deptHead->headImg = $image;


    }

    $deptHead->save();

        return redirect()->back();



    }


    public function delete_deptHead($id = null) {
        $dept_head = DeptHeads::find($id)->delete();
        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\Rules\Exists;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades;
use PHPUnit\Framework\MockObject\Builder\Stub;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentExportData;
use App\Helpers\Helper;



class StudentController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    |  Export Student Record in CSV File
    |--------------------------------------------------------------------------
    */
    function export_student_csv()
    {
        return Excel::download(new StudentExportData, 'student-list.csv');
    }


    /*
    |--------------------------------------------------------------------------
    |  Export Student Record in EXCEL File
    |--------------------------------------------------------------------------
    */
    function export_student_excel()
    {
        return Excel::download(new StudentExportData, 'student-list.xlsx');
    }


    /*
    |--------------------------------------------------------------------------
    |  Delete All Student Record with CheckBoxes
    |--------------------------------------------------------------------------
    */
    function delete_all_student(Request $req)
    {
        $ids = $req->ids;
        DB::table("students")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Student Record Deleted successfully."]);
    }


    /*
    |--------------------------------------------------------------------------
    |  Add New Student
    |--------------------------------------------------------------------------
    */
    function add_new_student(Request $req)
    {
        $validate_data =  $req->validate([
            'name'          =>   'required|string|min:1|max:255',
            'course'        =>   'required|string|min:1|max:255',
            'year'          =>   'required',
            'department'    =>   'required|string|min:1|max:255',
            'session'       =>   'required|string|min:1|max:35',
            'gender'        =>   'required',
            'address'       =>   'string',
            'contact'       =>   'required|digits:10',
        ]);

        $reg_no = Helper::IDGenerator(new Student, 'reg_no', 2, 'STD');


        $student_to_add = new Student;

        $student_to_add->reg_no             =    $reg_no;
        $student_to_add->name               =    $req->name;
        $student_to_add->course             =    $req->course;
        $student_to_add->year               =    $req->year;
        $student_to_add->department         =    $req->department;
        $student_to_add->session            =    $req->session;
        $student_to_add->gender             =    $req->gender;
        $student_to_add->address            =    $req->address;
        $student_to_add->contact            =    $req->contact;
        $student_to_add->registration_date  =    Carbon::now()->format('d-M-Y');

        if (DB::table('students')->where('reg_no', $req->reg_no)->exists()) {
            return back()->with('fail', 'Please check! this registration number is already exist.');
        } else {
            $student_to_add->save();
            return back()->with('success', 'Student Registration Completed. Please Note Down your Library ID -> ' . $reg_no);
        }
    }



    /*
    |--------------------------------------------------------------------------
    | Get Student Detail
    |--------------------------------------------------------------------------
    */
    function get_student_list(Request $req)
    {
        $search_text = $req->input('query');
        $students = DB::table('students')
            ->select('*')
            ->where('name', 'LIKE', '%' . $search_text . '%')
            ->orWhere('reg_no', 'LIKE', '%' . $search_text . '%')
            ->orWhere('course', 'LIKE', '%' . $search_text . '%')           
            ->paginate(15);
        return view('student.studentList', ['students' => $students]);        
    }



    /*
    |--------------------------------------------------------------------------
    |   Delete to Student
    |--------------------------------------------------------------------------
    */
    function delete_student_record($id)
    {
        $student_to_delete = Student::find($id);
        $result = $student_to_delete->delete();
        if ($result) {
            return back()->with('success', 'The student record has been removed.');
        } else {
            return back()->with('fail', ' Sorry! something went wrong.');
        }
    }



    /*
    |--------------------------------------------------------------------------
    |   Show detail for update Student Record
    |--------------------------------------------------------------------------
    */
    function show_student_detail_for_update($id)
    {
        $student_data = Student::find($id);
        return view('student.updateStudent', ['student_data' => $student_data]);
    }


    /*
    |--------------------------------------------------------------------------
    |  Update Student Record
    |--------------------------------------------------------------------------
    */
    function update_student_detail(Request $req)
    {
        $validate_data =  $req->validate([
            'name'          =>   'required|string|min:1|max:35',
            'course'        =>   'required|string|min:1|max:35',
            'year'          =>   'required',
            'department'    =>   'required|string|min:1|max:35',
            'session'       =>   'required|string|min:1|max:35',
            'address'       =>   'string',
            'contact'       =>   'required|digits:10',
        ]);
        $student_to_update =  Student::find($req->id);

        $student_to_update->name       =    $req->name;
        $student_to_update->course     =    $req->course;
        $student_to_update->year       =    $req->year;
        $student_to_update->department =    $req->department;
        $student_to_update->session    =    $req->session;
        $student_to_update->address    =    $req->address;
        $student_to_update->contact    =    $req->contact;

        if (true === $student_to_update->save()) {
            return redirect('studentList')->with('success', 'Student detail has been successfully updated');
        }
        return  redirect('studentList')->with('fail', 'Theres is a problem updating this student data');
    }

}
 
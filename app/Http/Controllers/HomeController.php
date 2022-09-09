<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\Rules\Exists;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Student;
use App\Models\User;
use App\Models\Issue;
use App\Models\Staffmember;
use App\Models\Lostdamagebook;
use App\Models\Note;



class HomeController extends Controller
{


  /*
    |--------------------------------------------------------------------------
    |  Add to Notes
    |--------------------------------------------------------------------------
    */
  function add_to_notes(Request $req)
  {
    $validate_data =  $req->validate([
      'subject'     =>   'required|min:1|max:35',
      'message'     =>   'required|min:1|max:1000',
    ]);
    $add_notes = new Note;

    $add_notes->subject = $req->subject;
    $add_notes->message = $req->message;
    $add_notes->date = Carbon::now()->format('d-M-Y');
    $add_notes->save();
    return redirect('home');
  }



  /*
    |--------------------------------------------------------------------------
    |  Delete Notes
    |--------------------------------------------------------------------------
    */
  function delete_to_notes($id)
  {
    $delete_to_notes = Note::find($id);
    $result = $delete_to_notes->delete();
    if ($result) {
      return back()->with('success', 'Notes Removed');
    } else {
      return back()->with('fail', 'There is a problem to removed notes');
    }
  }


  /*
    |--------------------------------------------------------------------------
    |  Get Home Page Detail
    |--------------------------------------------------------------------------
    */
  function get_home_page_detail(Request $req)
  {

    /*
    |--------------------------------------------------------------------------
    |  Get Notes
    |--------------------------------------------------------------------------
    */
    $get_notes = DB::table('notes')->orderByDesc('id')->get();



    /*
    |--------------------------------------------------------------------------
    |  Get Current Date
    |--------------------------------------------------------------------------
    */
    $current_date = Carbon::now()->format('d-F-y');



    /*
    |--------------------------------------------------------------------------
    |  Get total Books
    |--------------------------------------------------------------------------
    */
    $total_books_count          =   DB::table('books')->select('*')->count();



    /*
    |--------------------------------------------------------------------------
    |  Get total Students
    |--------------------------------------------------------------------------
    */
    $total_student_count        =   DB::table('students')->count();



    /*
    |--------------------------------------------------------------------------
    |  Get total Staff Members
    |--------------------------------------------------------------------------
    */
    $total_staff_members_count  =   DB::table('staffmembers')->count();



    /*
    |--------------------------------------------------------------------------
    |   Get total issue books
    |--------------------------------------------------------------------------
    */
    $total_issue_book_count     =   DB::table('issues')->where('return_date', '=', null)->count();



    /*
    |--------------------------------------------------------------------------
    |  Get Not Return Books Till Now
    |--------------------------------------------------------------------------
    */
    $not_return_book_count  =  DB::table('issues')->where('return_date', '=', null)->count();
    $not_return_book_list   =  DB::table('issues')->where('return_date', '=', null)->get();



    /*
    |--------------------------------------------------------------------------
    |  Get Return Book List Return at Today 
    |--------------------------------------------------------------------------
    */
    $returned_books_today_count = DB::table('issues')->where('return_date', '=', Carbon::now()->format('y-m-d'))->count();
    $return_book_today_list = DB::table('issues')->where('return_date', '=', Carbon::now()->format('y-m-d'))->get();



    /*
    |--------------------------------------------------------------------------
    |   Get Due Books at Today
    |--------------------------------------------------------------------------
    */
    $due_books_today_count = DB::table('issues')->where('due_date', '=', Carbon::now()->format('y-m-d'))
      ->where('return_date', '=', null)
      ->count();
    $due_book_today_list = DB::table('issues')->where('due_date', '=', Carbon::now()->format('y-m-d'))
      ->where('return_date', '=', null)
      ->get();



    /*
    |--------------------------------------------------------------------------
    |  Search Issue Book on Home Page
    |--------------------------------------------------------------------------
    */
    $search_text = $req->input('query');
    $return_books_to_show_data = DB::table('issues')
      
      ->where('accno', 'LIKE', '%' . $search_text . '%')    
      ->orWhere('reg_no', 'LIKE', '%' . $search_text . '%')
      ->orWhere('issue_id', 'LIKE', '%' . $search_text . '%')     
      ->orderByDesc('id')
      ->paginate(2);


    /*
    |--------------------------------------------------------------------------
    |  Get Total fines till now
    |--------------------------------------------------------------------------
    */
    $total_fine = DB::table('issues')->whereNotNull('return_date')->sum('fine');


    /*
    |--------------------------------------------------------------------------
    |  Get Total Lost Books Detail
    |--------------------------------------------------------------------------
    */
    $total_lost_books = DB::table('lostdamagebooks')->where('book_condition', '=', 'lost')->count();


    /*
    |--------------------------------------------------------------------------
    |  Get Total Damage Books Detail
    |--------------------------------------------------------------------------
    */
    $total_damage_books = DB::table('lostdamagebooks')->where('book_condition', '=', 'damage')->count();


    /*
    |--------------------------------------------------------------------------
    |  Get Total fines of Lost & Damage Books
    |--------------------------------------------------------------------------
    */
    $total_fine_lost_damage_books = DB::table('lostdamagebooks')->sum('fine');




    /*
    |--------------------------------------------------------------------------
    |  Return View on Home Page
    |--------------------------------------------------------------------------
    */
    return view('home', [
      'current_date'                    =>   $current_date,
      'total_books_count'               =>   $total_books_count,
      'total_student_count'             =>   $total_student_count,
      'total_staff_members_count'       =>   $total_staff_members_count,
      'total_issue_book_count'          =>   $total_issue_book_count,
      'total_fine'                      =>   $total_fine,
      'due_books_today_count'           =>   $due_books_today_count,
      'due_today_lists'                 =>   $due_book_today_list,
      'not_return_book_counts'          =>   $not_return_book_count,
      'not_return_book_lists'           =>   $not_return_book_list,
      'returned_books_today_count'      =>   $returned_books_today_count,
      'return_book_today_lists'         =>   $return_book_today_list,
      'return_books_to_shows'           =>   $return_books_to_show_data,
      'total_lost_books'                =>   $total_lost_books,
      'total_damage_books'              =>   $total_damage_books,
      'total_fine_lost_damage_books'    =>   $total_fine_lost_damage_books,
      'get_notes'                       =>   $get_notes,

    ]);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use Carbon\Carbon;
use App\Models\Issue;
use App\Models\Student;
use App\Models\Staffmember;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IssueBookExport;
use App\Helpers\Helper;


class IssueBookController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    |  Export Issue Book History in CSV File
    |--------------------------------------------------------------------------
    */
    function export_issue_books_csv()
    {
        return Excel::download(new IssueBookExport, 'issue-books-list.csv');
    }

    /*
    |--------------------------------------------------------------------------
    |  Export Issue Book History in EXCEL File
    |--------------------------------------------------------------------------
    */
    function export_issue_books_excel(Request $request)
    {
        return Excel::download(new IssueBookExport, 'issue-books-list.xlsx');
    }

  
    
    /*
    |--------------------------------------------------------------------------
    |  Delete All History with CheckBoxes
    |--------------------------------------------------------------------------
    */
    function delete_all_history(Request $req)
    {
        $ids = $req->ids;
        DB::table("issues")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "History removed successfully."]);
    }


    /*
    |--------------------------------------------------------------------------
    |  Issue book to student as well as staff 
    |--------------------------------------------------------------------------
    */
    function issue_books(Request $req)
    {
        $validate_data = $req->validate([
            'accno'             =>   'required|regex:/^[0-9]+$/|min:1|max:20',
            'title'             =>   'max:255',
            'reg_no'            =>   'required|min:1|max:15',
            'name'              =>   'max:35',
            'department'        =>   'required|string|min:1|max:255',
            'member_type'       =>   'required',
        ]);

        $issue_id = Helper::IDGenerator(new Issue, 'issue_id', 2, 'IID');

        $issue_book = new Issue;

        $issue_book->issue_id           =     $issue_id;
        $issue_book->accno              =     $req->accno;
        $issue_book->title              =     $req->title;
        $issue_book->reg_no             =     $req->reg_no;
        $issue_book->name               =     $req->name;
        $issue_book->department         =     $req->department;
        $issue_book->member_type        =     $req->member_type;
        $issue_book->issue_date         =     Carbon::now();
        $get_due_date                   =     Carbon::now()->addDays(14);
        $issue_book->due_date           =     $get_due_date;
        $issue_book->return_date        =     $req->return_date;
       

        if ((DB::table('students')->where('reg_no', $req->reg_no)->exists()) and
            (DB::table('books')->where('accno', $req->accno)->exists())
        ) {
            $issue_book->save();
            return back()->with('success', 'Book has been issue to Student. Please Note Down your Issue ID -> ' . $issue_id);
        } elseif ((DB::table('staffmembers')->where('reg_no', $req->reg_no)->exists()) and
            (DB::table('books')->where('accno', $req->accno)->exists())
        ) {
            $issue_book->save();
            return back()->with('success', 'Book has been issue to Staff. Please Note Down your Issue ID -> ' . $issue_id);
        } else {
            return back()->with('fail', 'Something went wrong! Please verify the book accno or member registration number.');
        }
    }



    /*
    |--------------------------------------------------------------------------
    |  Get Issue Book List 
    |--------------------------------------------------------------------------
    */
    function get_issue_book_list(Request $req)
    {
        $search_text = $req->input('query');
        $issue_book_data_to_show = DB::table('issues')
            ->select('*')
            ->where('issue_id', 'LIKE', '%' . $search_text . '%')
            ->orWhere('accno', 'LIKE', '%' . $search_text . '%')
            ->orWhere('title', 'LIKE', '%' . $search_text . '%')
            ->orWhere('name', 'LIKE', '%' . $search_text . '%')
            ->orWhere('reg_no', 'LIKE', '%' . $search_text . '%')
            ->paginate(15);

        return view('issuebook.issue-book-list', ['issue_books' => $issue_book_data_to_show]);
    }



    /*
    |--------------------------------------------------------------------------
    |  Show Issue Book Data for Book Return 
    |--------------------------------------------------------------------------
    */
    function show_book_detail_for_return($id)
    {
        $return_book_data = Issue::find($id);
        $old_fine = $return_book_data->fine;
        return view('issuebook.returnBook', ['return_book_data' => $return_book_data, 'old_fine'=>$old_fine]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Return Issue Book
    |--------------------------------------------------------------------------
    */
    function return_issue_book(Request $req)
    {
        $validate_data = $req->validate([
            'return_date'   =>   'required|date_format:Y-m-d',
            'fine'          =>   'required|min:1|max:12|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $return_issue_book =  Issue::find($req->id);

        $return_issue_book->return_date    =     $req->return_date;       
        $old_fine                          =     $return_issue_book->fine;       
        $return_issue_book->fine           =     $old_fine  + $req->fine;
        if (true === $return_issue_book->save()) {
            return redirect('home')->with('success', 'Book has been successfully return');
        }
        return  redirect('issue-book-list')->with('fail', 'Theres is a problem return this book');
    }


    /*
    |--------------------------------------------------------------------------
    |  Show Issue Book Data for Book Renew 
    |--------------------------------------------------------------------------
    */
    function show_book_detail_for_renew($id)
    {
        $renew_book_data = Issue::find($id);
        $old_fine = $renew_book_data->fine;
        return view('issuebook.renew-book', ['renew_book_data' => $renew_book_data, 'old_fine'=>$old_fine]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Return Issue Book
    |--------------------------------------------------------------------------
    */
    function renew_book(Request $req)
    {
        $validate_data = $req->validate([           
            'fine'          =>   'required|min:1|max:12|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $renew_issue_book =  Issue::find($req->id);        
  
        $renew_issue_book->issue_date         =     Carbon::now();
        $get_due_date                         =     Carbon::now()->addDays(14);
        $renew_issue_book->due_date           =     $get_due_date;
        $old_fine                             =     $renew_issue_book->fine;       
        $renew_issue_book->fine               =     $old_fine  + $req->fine;

        if (true === $renew_issue_book->save()) {
            return redirect('home')->with('success', 'Book has been successfully Renew');
        }
        return  redirect('issue-book-list')->with('fail', 'Theres is a problem renew this book');
    }



    /*
    |--------------------------------------------------------------------------
    |   Get Issue Book History
    |--------------------------------------------------------------------------
    */
    function get_history(Request $req)
    {
        $req->validate([
            // 'query' => 'required|min:2'
        ]);
        $search_text = $req->input('query');
        $issue_books = DB::table('issues')
            ->select('*')
            ->where('issue_id', 'LIKE', '%' . $search_text . '%')
            ->orWhere('title', 'LIKE', '%' . $search_text . '%')
            ->orWhere('accno', 'LIKE', '%' . $search_text . '%')
            ->orWhere('reg_no', 'LIKE', '%' . $search_text . '%')
            ->orWhere('name', 'LIKE', '%' . $search_text . '%')
            ->orWhere('department', 'LIKE', '%' . $search_text . '%')
            ->paginate(15);
        return view('issuebook.history', ['issue_books'     =>  $issue_books]);
    }




    /*
    |--------------------------------------------------------------------------
    |  Delete Issue Book
    |--------------------------------------------------------------------------
    */
    function delete_issue_book($id)
    {
        $delete_issue_book = Issue::find($id);
        $result = $delete_issue_book->delete();
        if ($result) {
            return back()->with('success', 'Data has been removed successfully !');
        } else {
            return back()->with('fail', ' Sorry! something went wrong.');
        }
    }
}

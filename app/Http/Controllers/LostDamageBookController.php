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
use App\Models\Lostdamagebook;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LostDamageBookExport;


class LostDamageBookController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    |  Excel Report Export
    |--------------------------------------------------------------------------
    */
    function export_report_excel()
    {
        return Excel::download(new LostDamageBookExport, 'Reports.xlsx');
    }

    /*
    |--------------------------------------------------------------------------
    |  CSV Report Export
    |--------------------------------------------------------------------------
    */
    function export_report_csv()
    {
        return Excel::download(new LostDamageBookExport, 'Reports.csv');
    }


    /*
    |--------------------------------------------------------------------------
    |  Delete All Reports with CheckBoxes
    |--------------------------------------------------------------------------
    */
    function delete_all_reports(Request $req)
    {
        $ids = $req->ids;
        DB::table("lostdamagebooks")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Reports removed successfully."]);
    }



    /*
    |--------------------------------------------------------------------------
    |  Add Books report that are Lost & Damage 
    |--------------------------------------------------------------------------
    */
    function add_lost_damage_book(Request $req)
    {
        $validate_data =  $req->validate([
            'accno'             =>   'required|regex:/^[0-9]+$/|min:1|max:20',
            'title'             =>   'max:255',
            'reg_no'            =>   'required',
            'department'        =>   'required|string|min:1|max:255',
            'member_type'       =>   'required',
            'book_condition'    =>   'required',
            'fine'              =>   'required|min:1|max:12|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $add_to_lost_damage_book = new Lostdamagebook;

        $add_to_lost_damage_book->accno          =   $req->accno;
        $add_to_lost_damage_book->title           =   $req->title;
        $add_to_lost_damage_book->reg_no          =   $req->reg_no;
        $add_to_lost_damage_book->department      =   $req->department;
        $add_to_lost_damage_book->member_type     =   $req->member_type;
        $add_to_lost_damage_book->book_condition  =   $req->book_condition;
        $add_to_lost_damage_book->fine            =   $req->fine;

        if ((DB::table('students')->where('reg_no', $req->reg_no)->exists()) and
            (DB::table('issues')->where('accno', $req->accno)->exists()) and
            (DB::table('issues')->where('reg_no', $req->reg_no)->exists())
        ) {
            $add_to_lost_damage_book->save();
            return back()->with('success', 'Book report of Student has been saved.'); 
        } elseif ((DB::table('staffmembers')->where('reg_no', $req->reg_no)->exists())  and
            (DB::table('issues')->where('accno', $req->accno)->exists()) and
            (DB::table('issues')->where('reg_no', $req->reg_no)->exists())
        ) {
            $add_to_lost_damage_book->save();
            return back()->with('success', 'Book report of Staff Member has been saved.');
        } else {
            return back()->with('fail', 'Something went wrong! Please verify the book accno or member registration number.');
        }
    }



    /*
    |--------------------------------------------------------------------------
    |  See List of Lost & Damage Books 
    |--------------------------------------------------------------------------
    */
    function see_lost_damage_book_list(Request $req)
    {
        $req->validate([
            // 'query' => 'required|min:2'
        ]);
        $search_text = $req->input('query');
        $lost_damage_book_to_show = DB::table('lostdamagebooks')
            ->select('*')
            ->where('accno', 'LIKE', '%' . $search_text . '%')
            ->orWhere('title', 'LIKE', '%' . $search_text . '%')
            ->orWhere('reg_no', 'LIKE', '%' . $search_text . '%')
            ->orWhere('member_Type', 'LIKE', '%' . $search_text . '%')
            ->orWhere('book_condition', 'LIKE', '%' . $search_text . '%')
            ->paginate(10);
        return view('reports.lost-damage-book-list', ['reports_lists' => $lost_damage_book_to_show]);
    }



    /*
    |--------------------------------------------------------------------------
    |  Delete Reports of Lost & Damage Books
    |--------------------------------------------------------------------------
    */
    function delete_lost_damage_book_report($id)
    {
        $lost_damage_book_to_delete = Lostdamagebook::find($id);
        $result = $lost_damage_book_to_delete->delete();
        if ($result) {
            return back()->with('success', 'The Book report has been removed!');
        } else {
            return back()->with('fail', ' Sorry! something went wrong.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    |  Show Reports detail for update
    |--------------------------------------------------------------------------
    */
    function show_report_detail_for_update($id)
    {
        $show_report_data = Lostdamagebook::find($id);
        return view('reports.update-lost-damage-report', ['show_report_data' => $show_report_data]);
    }


    /*
    |--------------------------------------------------------------------------
    |  Update Report
    |--------------------------------------------------------------------------
    */
    function update_lost_damage_report(Request $req)
    {
        $validate_data =  $req->validate([
            'accno'             =>   'required|regex:/^[0-9]+$/|min:1|max:20',
            'title'             =>   'max:255',
            'reg_no'            =>   'require',
            'department'        =>   'required|string|min:1|max:255',
            'member_type'       =>   'required',
            'book_condition'    =>   'required',
            'fine'              =>   'required|min:1|max:12|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $lost_damage_report_to_update =  Lostdamagebook::find($req->id);

        $lost_damage_report_to_update->accno          =   $req->accno;
        $lost_damage_report_to_update->title           =   $req->title;
        $lost_damage_report_to_update->reg_no          =   $req->reg_no;
        $lost_damage_report_to_update->department      =   $req->department;
        $lost_damage_report_to_update->member_type     =   $req->member_type;
        $lost_damage_report_to_update->book_condition  =   $req->book_condition;
        $lost_damage_report_to_update->fine            =   $req->fine;

        if (true === $lost_damage_report_to_update->save()) {
            return redirect('lost-damage-book-list')->with('success', 'Report has been changed');
        }
        return  redirect('lost-damage-book-list')->with('fail', 'Sorry! something went wrong');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\Rules\Exists;
use App\Models\Staffmember;
use Carbon\Carbon;
use App\Helpers\Helper;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffMemberExport;


class StaffMemberController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    |  Export Staff Member Record in CSV File
    |--------------------------------------------------------------------------
    */
    function export_staff_member_csv()
    {
        return Excel::download(new StaffMemberExport, 'staff-members-list.csv');
    }

    /*
    |--------------------------------------------------------------------------
    |  Export Staff Member Record in EXCEL File
    |--------------------------------------------------------------------------
    */
    function export_staff_member_excel()
    {
        return Excel::download(new StaffMemberExport, 'staff-members-list.xlsx');
    }

   /*
    |--------------------------------------------------------------------------
    |  Delete All Staff Record with CheckBoxes
    |--------------------------------------------------------------------------
    */
    function delete_all_staff(Request $req)
    {
        $ids = $req->ids;
        DB::table("staffmembers")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Staff Mmber Record Removed successfully."]);
    }



    /*
    |--------------------------------------------------------------------------
    |  Add New Staff Member
    |--------------------------------------------------------------------------
    */
    function add_new_staff_member(Request $req)
    {
        $validate_data =  $req->validate([
            'staff_name'    =>   'required|string|min:1|max:255',
            'designation'   =>   'required|string|min:1|max:255',
            'department'    =>   'required|string|min:1|max:255',
            'gender'        =>   'required',
            'address'       =>   'string',
            'contact'       =>   'required|digits:10',
        ]);

        $reg_no = Helper::IDGenerator(new Staffmember, 'reg_no', 2, 'STF');

        $staff_member_to_add = new Staffmember;

        $staff_member_to_add->reg_no            = $reg_no;
        $staff_member_to_add->staff_name        = $req->staff_name;
        $staff_member_to_add->designation       = $req->designation;
        $staff_member_to_add->department        = $req->department;
        $staff_member_to_add->registration_date = Carbon::now()->format('d-M-Y');
        $staff_member_to_add->gender            = $req->gender;
        $staff_member_to_add->address           = $req->address;
        $staff_member_to_add->contact           = $req->contact;

        if (DB::table('staffmembers')->where('reg_no', $req->reg_no)->exists()) {
            return back()->with('fail', 'Sorry! Please check! this registration number is already exist.');
        } else {
            $staff_member_to_add->save();
            return back()->with('success', 'Staff Member Registration Completed. Please Note Down your Library ID -> ' . $reg_no);
        }
    }


    /*
    |--------------------------------------------------------------------------
    |  Get Staff Member Detail
    |--------------------------------------------------------------------------
    */
    function get_staff_member_list(Request $req)
    {
        $req->validate([
            // 'query' => 'required|min:2'
        ]);
        $search_text = $req->input('query');
        $staff_member_data_to_show = DB::table('staffmembers')
            ->select('*')
            ->where('staff_name', 'LIKE', '%' . $search_text . '%')
            ->orWhere('reg_no', 'LIKE', '%' . $search_text . '%')
            ->orWhere('department', 'LIKE', '%' . $search_text . '%')
            ->paginate(15);
        return view('staff-members.staff-members-list', ['staff_member' => $staff_member_data_to_show]);
    }



    /*
    |--------------------------------------------------------------------------
    |  Delete to Staff Member Record
    |--------------------------------------------------------------------------
    */
    function delete_staff_member_record($id)
    {
        $staff_member_to_delete = Staffmember::find($id);
        $result = $staff_member_to_delete->delete();
        if ($result) {
            return back()->with('success', 'Congrats! The staff member record has been deleted.');
        } else {
            return back()->with('fail', ' Sorry! something went wrong.');
        }
    }



    /*
    |--------------------------------------------------------------------------
    |  Show detail for update Staff Member Record
    |--------------------------------------------------------------------------
    */
    function show_staff_member_detail_for_update($id)
    {
        $staff_member_data = Staffmember::find($id);
        return view('staff-members.edit-staff-members', ['staff_member_data' => $staff_member_data]);
    }


    /*
    |--------------------------------------------------------------------------
    |   Update Staff Member Record
    |--------------------------------------------------------------------------
    */ 
    function update_staff_member_detail(Request $req)
    {
        $validate_data =  $req->validate([
            'staff_name'    =>   'required|string|min:1|max:255',
            'designation'   =>   'required|string|min:1|max:255',
            'department'    =>   'required|string|min:1|max:255',
            'address'       =>   'string',
            'contact'       =>   'required|digits:10',
        ]);
        $staff_member_to_update = Staffmember::find($req->id);

        $staff_member_to_update->staff_name     =   $req->staff_name;
        $staff_member_to_update->designation    =   $req->designation;
        $staff_member_to_update->department     =   $req->department;
        $staff_member_to_update->address        =   $req->address;
        $staff_member_to_update->contact        =   $req->contact;

        if (true === $staff_member_to_update->save()) {
            return redirect('staff-members-list')->with('success', 'Staff member detail has been successfully updated');
        }
        return  redirect('staff-members-list')->with('fail', 'Theres is a problem updating this staff member record');
    }
}

<?php

namespace App\Http\Controllers;
// namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\Rules\Exists;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  


    /*
    |--------------------------------------------------------------------------
    |  Create new Admin/Users/Librarian Acount 
    |--------------------------------------------------------------------------
    */
    function create_new_admin_account(Request $req)
    {
        $validatedata =  $req->validate([
            'name'      => 'required|min:1|max:15',
            'email'     => 'required|email|string|max:255',
            'password'  => 'required|min:8|string',
            'gender'    => 'required',
            'dob'       => 'required',
        ]);
        $create_to_account     =   new User;

        $create_to_account->name          =   $req->name;
        $create_to_account->email         =   $req->email;
        $create_to_account->password      =   Hash::make($req->password);
        $create_to_account->designation   =   $req->designation;
        $create_to_account->dob           =   $req->dob;
        $create_to_account->gender        =   $req->gender; 
        $create_to_account->address       =   $req->address;
        $create_to_account->contact       =   $req->contact;

        if (DB::table('users')->where('email', $req->email)->exists()) {
            return back()->with('fail', 'Sorry! Please check! this email already exist.');
        } else {
            $create_to_account->save();
            return back()->with('success', 'Thank you! The new Librarian registration has been done.');
        }
    }



    /*
    |--------------------------------------------------------------------------
    |   Get Admin/Users/Librarian List
    |--------------------------------------------------------------------------
    */
    function get_admin_List()
    {
        $user_detail_to_show = User::all();
        return view('auth.settings', ['user' => $user_detail_to_show]);
    }



    /*
    |--------------------------------------------------------------------------
    |  Delete to Admin/Users/Librarian
    |--------------------------------------------------------------------------
    */
    function delete_admin_account($id)
    {
        $user_to_delete = User::find($id);
        $user_to_delete_id = $user_to_delete['id'] ?? 0;

        $current_user_id = Auth::id();

        if ($user_to_delete_id === $current_user_id) {
            return back()->with('fail', ' Sorry! The cureent user is not remove.');
        } else {
            $user_to_delete->delete();
            return back()->with('success', 'User has been removed successfully !');
        }
    }
}

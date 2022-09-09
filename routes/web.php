<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IssueBookController;
use App\Http\Controllers\LostDamageBookController;
use App\Http\Controllers\StaffMemberController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
|  Home Page Route 
|--------------------------------------------------------------------------
*/
Route::view('/home', 'home')->middleware('auth');
Route::get('home', [HomeController::class, 'get_home_page_detail'])->middleware('auth');
Route::post('home', [HomeController::class, 'add_to_notes'])->middleware('auth');
Route::get('delete-to-notes/{id}', [HomeController::class, 'delete_to_notes'])->middleware('auth');



/*
|--------------------------------------------------------------------------
|  Books Route
|--------------------------------------------------------------------------
*/
Route::view('/addbook', 'books.addbook')->middleware('auth');
Route::post('/addbook', [BookController::class, 'add_new_book'])->middleware('auth');
Route::get('/book-list', [BookController::class, 'show_book_details'])->middleware('auth');
Route::get('/delete/{id}', [BookController::class, 'delete_book_record'])->middleware('auth');
Route::get('/editBook/{id}', [BookController::class, 'show_book_data_for_update'])->middleware('auth');
Route::post('/editBook/{id}', [BookController::class, 'update_book_detail'])->middleware('auth'); 
Route::get('/export-book-csv', [BookController::class, 'export_book_csv'])->middleware('auth');
Route::get('/export-book-excel', [BookController::class, 'export_book_excel'])->middleware('auth');
Route::delete('delete-all-books', [BookController::class, 'delete_all_books'])->middleware('auth');



/*
|--------------------------------------------------------------------------
|  Student Route
|--------------------------------------------------------------------------
*/
Route::view('/addStudent', 'student.addStudent')->middleware('auth');
Route::post('/addStudent', [StudentController::class, 'add_new_student'])->middleware('auth');
Route::get('/studentList', [StudentController::class, 'get_student_list'])->middleware('auth');
Route::get('/deleteStudent/{id}', [StudentController::class, 'delete_student_record'])->middleware('auth');
Route::get('/editStudent/{id}', [StudentController::class, 'show_student_detail_for_update'])->middleware('auth');
Route::post('/editStudent/{id}', [StudentController::class, 'update_student_detail'])->middleware('auth');
Route::get('/export-student-csv', [StudentController::class, 'export_student_csv'])->middleware('auth');
Route::get('/export-student-excel', [StudentController::class, 'export_student_excel'])->middleware('auth');
Route::delete('delete-all-student', [StudentController::class, 'delete_all_student'])->middleware('auth');



/*
|--------------------------------------------------------------------------
|  Staff Member Route
|--------------------------------------------------------------------------
*/
Route::view('/add-staff-members', 'staff-members.add-staff-members')->middleware('auth');
Route::post('/add-staff-members', [StaffMemberController::class, 'add_new_staff_member'])->middleware('auth');
Route::get('/staff-members-list', [StaffMemberController::class, 'get_staff_member_list'])->middleware('auth');
Route::get('/delete-staff-members/{id}', [StaffMemberController::class, 'delete_staff_member_record'])->middleware('auth');
Route::get('/edit-staff-members/{id}', [StaffMemberController::class, 'show_staff_member_detail_for_update'])->middleware('auth');
Route::post('/edit-staff-members/{id}', [StaffMemberController::class, 'update_staff_member_detail'])->middleware('auth');
Route::get('/export-staff-member-excel', [StaffMemberController::class, 'export_staff_member_excel'])->middleware('auth');
Route::get('/export-staff-member-csv', [StaffMemberController::class, 'export_staff_member_csv'])->middleware('auth');
Route::delete('delete-all-staff', [StaffMemberController::class, 'delete_all_staff'])->middleware('auth');



/*
|--------------------------------------------------------------------------
|  Issue Books Route
|--------------------------------------------------------------------------
*/
Route::view('/issue-book', 'issuebook.issue-book')->middleware('auth');
Route::post('/issue-book', [IssueBookController::class, 'issue_books'])->middleware('auth');
Route::get('/issue-book-list', [IssueBookController::class, 'get_issue_book_list'])->middleware('auth');
Route::get('/returnBook/{id}', [IssueBookController::class, 'show_book_detail_for_return'])->middleware('auth');
Route::post('/returnBook/{id}', [IssueBookController::class, 'return_issue_book'])->middleware('auth');
Route::get('/renew-book/{id}', [IssueBookController::class, 'show_book_detail_for_renew'])->middleware('auth');
Route::post('/renew-book/{id}', [IssueBookController::class, 'renew_book'])->middleware('auth');
Route::get('/issueBookDelete/{id}', [IssueBookController::class, 'delete_issue_book'])->middleware('auth');
Route::get('/history', [IssueBookController::class, 'get_history'])->middleware('auth');
Route::get('/export-issue-books-csv', [IssueBookController::class, 'export_issue_books_csv'])->middleware('auth');
Route::get('/export-issue-books-excel', [IssueBookController::class, 'export_issue_books_excel'])->middleware('auth');
Route::delete('delete-all-history', [IssueBookController::class, 'delete_all_history'])->middleware('auth');



/*
|--------------------------------------------------------------------------
|  Reports Lost Damage Books Route
|--------------------------------------------------------------------------
*/
Route::view('/add-lost-damage-books', 'reports.add-lost-damage-books')->middleware('auth');
Route::post('/add-lost-damage-books', [LostDamageBookController::class, 'add_lost_damage_book'])->middleware('auth');
Route::get('/lost-damage-book-list', [LostDamageBookController::class, 'see_lost_damage_book_list'])->middleware('auth');
Route::get('/delete-lost-damage-book-reports/{id}', [LostDamageBookController::class, 'delete_lost_damage_book_report'])->middleware('auth');
Route::get('/update-lost-damage-report/{id}', [LostDamageBookController::class, 'show_report_detail_for_update'])->middleware('auth');
Route::post('/update-lost-damage-report/{id}', [LostDamageBookController::class, 'update_lost_damage_report'])->middleware('auth');
Route::get('/export-report-csv', [LostDamageBookController::class, 'export_report_csv'])->middleware('auth');
Route::get('/export-report-excel', [LostDamageBookController::class, 'export_report_excel'])->middleware('auth');
Route::delete('delete-all-reports', [LostDamageBookController::class, 'delete_all_reports'])->middleware('auth');



/*
|--------------------------------------------------------------------------
|  Admin Settings Route 
|--------------------------------------------------------------------------
*/
Route::view('/settings', 'auth.settings')->middleware('auth');
Route::get('/settings', [UserController::class, 'get_admin_List'])->middleware('auth');
Route::post('/settings', [UserController::class, 'create_new_admin_account'])->middleware('auth');
Route::get('/deleteAdmin/{id}', [UserController::class, 'delete_admin_account'])->middleware('auth');



/*
|--------------------------------------------------------------------------
|  User Profile Auth Route
|--------------------------------------------------------------------------
*/
Route::view('/change-password', 'auth.change-password')->middleware('auth');
Route::view('/edit-Profile', 'auth.edit-Profile')->middleware('auth');
Route::view('/user-profile-view', 'auth.userProfile')->middleware('auth');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\Rules\Exists;
use App\Models\Book;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookExport;
 


class BookController extends Controller
{

     /*
    |--------------------------------------------------------------------------
    |  Export Book EXCEL
    |--------------------------------------------------------------------------
    */
    function export_book_excel()
    {      
        return Excel::download(new BookExport, 'books-list.xlsx');
    }

     /*
    |--------------------------------------------------------------------------
    |  Export Book CSV
    |--------------------------------------------------------------------------
    */
    function export_book_csv(Request $request)
    {              
        return Excel::download(new BookExport, 'books-list.csv');        
    }

/*
    |--------------------------------------------------------------------------
    |  Delete All Books with CheckBoxes
    |--------------------------------------------------------------------------
    */
    function delete_all_books(Request $req)
    {
        $ids = $req->ids;
        DB::table("books")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Books removed successfully."]);
    }



    /*
    |--------------------------------------------------------------------------
    |  Add New Book
    |--------------------------------------------------------------------------
    */
    function add_new_book(Request $req)
    {
        $validate_data =  $req->validate([
            'accno'     =>   'required|regex:/^[0-9]+$/|min:1|max:20',
            'title'     =>   'required|string|min:1|max:255',
            'author'    =>   'required|string|min:1|max:255', 
            'publisher' =>   'max:255',
            'edition'   =>   'max:255',
            'quantity'  =>   'required|regex:/^[0-9]+$/|min:1|max:5',
            'price'     =>   'required|min:1|max:12|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $book_to_add = new Book;

        $book_to_add->accno     = $req->accno;
        $book_to_add->title     = $req->title;
        $book_to_add->author    = $req->author;
        $book_to_add->publisher = $req->publisher;
        $book_to_add->edition   = $req->edition;
        $book_to_add->quantity  = $req->quantity;
        $book_to_add->price     = $req->price;

        if (DB::table('books')->where('accno', $req->accno)->exists()) {
            return back()->with('fail', 'Please check! this Book Acc. No. already exist');
        } else {
            $book_to_add->save();
            return back()->with('success', 'The new Book record has been inserted!');
        }
    }


    /*
    |--------------------------------------------------------------------------
    |  Show Book Detail
    |--------------------------------------------------------------------------
    */
    function show_book_details(Request $req)
    {
        $req->validate([
            // 'query' => 'required|min:2'
        ]);
        $search_text = $req->input('query');
        $book_data_to_show = DB::table('books')
            ->select('*')
            ->where('accno', 'LIKE', '%' . $search_text . '%')
            ->orWhere('title', 'LIKE', '%' . $search_text . '%')
            ->orWhere('author', 'LIKE', '%' . $search_text . '%')
            ->orWhere('publisher', 'LIKE', '%' . $search_text . '%')
            ->paginate(25);
        return view('books.book-list', ['books' => $book_data_to_show]);
    }


    /*
    |--------------------------------------------------------------------------
    |  Delete Book Record 
    |--------------------------------------------------------------------------
    */
    function delete_book_record($id)
    {
        $book_to_delete = Book::find($id);
        $result = $book_to_delete->delete();
        if ($result) {
            return back()->with('success', 'The Book record has been removed!');
        } else {
            return back()->with('fail', ' Sorry! something went wrong.');
        }
    }

    /*
    |--------------------------------------------------------------------------
    |  Show Book Detail for Update
    |--------------------------------------------------------------------------
    */
    function show_book_data_for_update($id)
    {
        $data = Book::find($id);
        return view('books.updateBook', ['data' => $data]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Update Book Detail
    |--------------------------------------------------------------------------
    */
    function update_book_detail(Request $req)
    {
        $validate_data =  $req->validate([
            'title'     =>   'required|string|min:1|max:255',
            'author'    =>   'required|string|min:1|max:255', 
            'publisher' =>   'max:255',
            'edition'   =>   'max:255',
            'quantity'  =>   'required|regex:/^[0-9]+$/|min:1|max:5',
            'price'     =>   'required|min:1|max:12|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        $book_to_update =  Book::find($req->id);

        $book_to_update->id         = $req->id;
        $book_to_update->title      = $req->title;
        $book_to_update->author     = $req->author;
        $book_to_update->publisher  = $req->publisher;
        $book_to_update->edition    = $req->edition;
        $book_to_update->quantity   = $req->quantity;
        $book_to_update->price      = $req->price;

        if (true === $book_to_update->save()) {
            return redirect('book-list')->with('success', 'Book has been successfully updated');
        }
        return  redirect('book-list')->with('fail', 'Theres is a problem updating this book data');
    }
}

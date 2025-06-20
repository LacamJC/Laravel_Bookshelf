<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        $id = session('user.id');

        // $books = User::find($id)
        //     ->books()
        //     ->whereNull('deleted_at')
        //     ->get()
        //     ->toArray();    

        $books = Book::orderBy('created_at', 'desc')->paginate(3);

        return view('home', ['books' => $books]);
    }

    public function login_page(){
        return view('login');
    }

    public function register_page(){
        return view('register');
    }

    public function new_book_page(){
        return view('book.register');
    }

    public function book($id){
        $id = Operations::decrypyId($id);
        if($id === NULL){
            return redirect()->route('home_page');
        }

        $book = Book::find($id);

        return view('book/view', ['book' => $book]);
    }


}

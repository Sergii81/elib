<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BookUser;
use App\Book;
use App\User;

class BookUserController extends Controller
{
    public function takeBook($id){        
        $book = Book::find($id);        
        return view('take', ['book'=> $book]);
    }
    
    public function bookUserStore(Request $request){
        
        $bookUser = new BookUser();
        $bookUser->book_id = $request->book_id;
        $bookUser->user_id = $request->user_id;
        $bookUser->back_time = date('Y-m-d H:i:s', strtotime("+1 day"));
        $bookUser->save();
        return view('user.book_takes');
    }
    
    public function userBooks(){        
        $user_id=Auth::user()->id;
        if(BookUser::pluck('user_id')->contains($user_id)){            	
	        $books = Auth::user()->books;                
            return view('user.user_books', ['books'=>$books]);
        	}
            else return view('user.no_books');
    }
    public function returnBook($id){
        $user_id=Auth::user()->id;
        $book = BookUser::where([['book_id', $id], ['user_id', $user_id]]);
        $book -> delete();
    	return view('user.book_return');
    	
    }
    
    public function readBook($id){
        $book = Book::find($id); 
        return view('read', ['book'=> $book]);
    }
    
    
    
}

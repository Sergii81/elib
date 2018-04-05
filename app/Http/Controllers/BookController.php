<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\BookUser;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $all = Book::orderby('id', 'desc')->paginate(5);
        $user = User::all();       
    	return view('admin.index',['all'=>$all, 'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->legend = $request->legend;
        
        
        if($request->hasFile('url_text')) {
            $text = $request->file('url_text');
            $fileName = $text->getClientOriginalName();
            $destinationPath = public_path('/files');
            $text->move($destinationPath, $fileName);            
            $book->url_text = './files/'.$fileName;
        }
        
        
        if($request->hasFile('url_picture')){
            $picture = $request->file('url_picture');
            $fileName = $picture->getClientOriginalName();
            $destinationPath = public_path('/images');
            $picture->move($destinationPath, $fileName);
            $book->url_picture = './images/'.$fileName;
        } 
        $book->save();
        
        return redirect()->route('admin.index');        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.edit', ['book'=> $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->legend = $request->legend;
        
        
        if($request->hasFile('url_text')) {
            $text = $request->file('url_text');
            $fileName = $text->getClientOriginalName();
            $destinationPath = public_path('/files');
            $text->move($destinationPath, $fileName);
            $book->url_text = '/blog/public/files/'.$fileName;
        }
        
        
        if($request->hasFile('url_picture')) {
            $picture = $request->file('url_picture');
            $fileName = $text->getClientOriginalName();
            $destinationPath = public_path('/images');
            $picture->move($destinationPath, $fileName);
            $book->url_picture = '/blog/public/images/'.$fileName;
        } 
        $book->save();
        
        return redirect()->route('admin.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $book = Book::destroy($id);
        //$book -> delete();
         return redirect()->route('admin.index');       
       
    }
    
    
}

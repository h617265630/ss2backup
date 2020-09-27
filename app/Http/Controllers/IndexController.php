<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Review;
use Illuminate\Support\Facades\Auth;
use DB;
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::paginate(8);
//        dd($book);
        $genre = DB::select('select distinct genre from book');
        return view('index',['book'=>$book,'genre'=>$genre]);
    }
    /**
     * show book list by its genre type
     */
    public function bookListByGenre($genre){
        $book = Book::where('genre',$genre)->paginate(8);


        $genre = DB::select('select distinct genre from book');
        return view('index',['book'=>$book,'genre'=>$genre]);
    }
    /**
     * show reviews from logged in user
     */
    public function reviews(){
        $id = Auth::id();
        $reviews = Review::where('user_id',$id)->paginate(8);

        $bookNameList = [];
        foreach($reviews as $key=>$r){
            $book = Book::where('id',$r['book_id'])->get()[0];
            $bookname = $book['title'];
            $bookNameList[] = $bookname;
            $r['bookName'] = $bookNameList[$key];
        }
        return view('auth.myReviews',['reviews'=>$reviews]);
    }

    /**
     * search function
     */

    public function search(Request $request){
        // title, author, genre,
        //and year
        $param = $request->all()['search'];
        $book = Book::where('title','like',$param)->orWhere('Author','like',$param)
            ->orWhere('genre','like',$param)->orWhere('published_year','like',$param)->get();

        $genre = DB::select('select distinct genre from book');
        return view('index',['book'=>$book,'genre'=>$genre]);
    }

    /*
  * no permisson
  */
    public function permission(){
        return view('noPermission');
    }
}

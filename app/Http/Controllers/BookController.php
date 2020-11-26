<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Review;
use App\User;
use App\Author;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * list up 5 high rating books0
     */
    public function highRatingBook(){
//        DB::connection()->enableQueryLog();
        $query ='SELECT b.*,avg(v.rating) as avgRating FROM book b, review v where v.book_id=b.id  and  DATE_ADD(v.created_at,interval 1 month)-CURRENT_TIMESTAMP>30 group by b.id having count(v.id)>2';
//        dd($query);
        $book = DB::select($query);
//        dd($book);

        return view('book.highRatingBook',['book'=>$book]);

    }
    /**
     * book detail page
     */
    public function bookDetailPage($id){


        $reviews = Review::where('book_id',$id)->paginate(5);
        $book = Book::find($id);
        foreach($reviews as $key=>$r){
            $user = User::where('id',$r['user_id'])->get()[0]['name'];
//            dd($user);
            $r['userName'] = $user;
        }
//        $author = [];
//        $re = explode(',',$book['author']);
//        foreach($re as $r){
//            $a = Author::where('book_name',$r)->get();
//            $author = $a;
//        }
//        dd($author);
        return view('book.bookDetailPage',['book'=>$book,'reviews'=>$reviews]);


    }
    /**
     * Show the add book page
     * @return add book page
     */
    public function goToAddBookPage(){
        $path = null;
        $genre = DB::select('select distinct genre from book');
        return view('/book/addBookPage',['path'=>$path,'genre'=>$genre]);
    }

    /*
     * upload a picture as book profile
     */
    public function upload(Request $request){
        $data = $request->all();
        $genre = DB::select('select distinct genre from book');
//        dd($data);
        $picture = $request->file('picture');
//        dd($data,$picture);

        if ($picture->isValid()) {
            $ext = $picture->getClientOriginalExtension();
            $path = $picture->getRealPath();
            $filename = 'images/data/upload/'.time().'.'.$ext;
//            dd($filename);
            Storage::disk('public')->put($filename, file_get_contents($path));
            return view('book.addBookPage',['path'=>$filename,'genre'=>$genre]);
        }
//        $filePath = $path;
//        return view('book.addBookPage',['path'=>$filePath]);
//        $data['picture'] = $filename;
//        Order::create($data);

    }
    /**
     * Add book
     * return back to book list page
     */
    public function store(Request $request){
        $param=$request->all();
//        dd($param);
        $validator = Validator::make($param,[
            'title' => 'required|string|unique:book',
            'author' => 'required',
            'genre'=> 'required|string',
            'p_year' => 'required|after:1700-01-01|before:2021-12-31',
            'profile_address'=>'required'
        ]);
        if($validator->fails()){
            return redirect('book/addBookPage')->withErrors($validator)->withInput();
        }else{
            $book = new Book;
            $book->title=$param['title'];
            $book->author=$param['author'];
            $book->genre=$param['genre'];
            $book->published_year=$param['p_year'];
            $book->profile_address=$param['profile_address'];
            $book->save();
            return redirect('/');
        }
    }

    /**
     * Edit book page
     */
    public function goToEditBookPage($id){

        $book = Book::find($id);
        return view('book.editBookPage',['book'=>$book]);
    }

    /**
     * Edit book information
     */
    public function editBook(Request $request)
    {
        $param = $request->all();

        $validator = Validator::make($param, [
            'title' => 'required|string',
            'author' => 'required',
            'genre' => 'required|string',
            'p_year' => 'required|after:1700-01-01|before:2021-12-31',
        ]);
        if ($validator->fails()) {
            return redirect('book/editBookPage/'.$param['id'])->withErrors($validator)->withInput();
        } else {
            $book = Book::find($param['id']);
            $book->title = $param['title'];
            $book->genre = $param['genre'];
            $book->published_year = $param['p_year'];
            $book->author = $param['author'];
//            $book->profile_address = $param['profile_address'];
            $book->save();
            return redirect('/');
        }
    }
    /**
     * delete book
     */
    public function delete($id){
        $book = Book::find($id);
        $book->delete();

//        $user_id = Auth::id();
        $reviews = Review::where('book_id',$id)->get();
        foreach($reviews as $key=>$r){
            $r->delete();
        }
        return back();
    }
    /*
     *
     *book recommendation
     */

    public function bookRecommendation(){

        $user_id = Auth::id();
        $query = 'select b.* ,v.rating from review v, book b where b.id=v.book_id and rating>2 and length(v.content)>5 group by b.id';
        $query2 = 'select b.* ,v.rating from review v, book b where b.id=v.book_id and rating>1 and length(v.content)>2 and v.user_id =? group by b.id';
//        $book = Book::all()->join(Review::all());
//        dd($book);
        $book = DB::select($query);
        $book_user_like = DB::select($query2,[$user_id]);


        $r = array_merge($book,$book_user_like);
//        dd($r);
        return view('book.recommendation',['book'=>$r]);
    }
}


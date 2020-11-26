<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use Illuminate\Support\Facades\Auth;
use Validator;
class ReviewController extends Controller
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
     * add review page
     */
    public function goToAddReviewPage($id){
        return view('review.addReviewPage',['book_id'=>$id]);
    }

    /**
     * add review
     */
    public function store(Request $request){
        $param=$request->all();
        $user_id = Auth::id();


        $validator = Validator::make($param,[
            'content' => 'required|string|min:5',
            'rating' => 'required|numeric|between:1,5',
        ]);
        if($validator->fails()){
            return redirect('/review/addReviewPage/'.$param['book_id'])->withErrors($validator)->withInput();
        }else{
            $review = Review::where('user_id',$user_id)->where('book_id',$param['book_id'])->get();
            if($review->isEmpty()){
                $review = new Review();
                $review->content = $param['content'];
                $review->rating = $param['rating'];
                $review->book_id = $param['book_id'];
                $review->user_id = $user_id;
                $review->save();
                return redirect('/book/bookDetail/'.$param['book_id']);
            }else{
                return back()->withErrors('the same user can only write one review for the same book');
            };
        }
    }
    /**
     * edit review page
     */
    public function gotoEditReviewPage($id){
        $review = Review::find($id);
        return view('review.editReviewPage',['review'=>$review]);
    }

    /**
     * edit review
     */

    public function editReview(Request $request){
        $param=$request->all();
        $user_id = Auth::id();
        $validator = Validator::make($param,[
            'content' => 'required|string|min:5',
            'rating' => 'required|numeric|between:1,5',
        ]);
        if($validator->fails()){
            return redirect('/review/editReviewPage/'.$param['id'])->withErrors($validator)->withInput();
        }else{
            $review = Review::find($param['id']);
            $review->content = $param['content'];
            $review->rating= $param['rating'];
            $review->save();
            return redirect('/user/reviews');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Author;
class AdminController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * User list
     * @return  home page
     */
    public function userList(){
        $users = User::where('user_type','Curator')->where('status','UnApproved')->get();
       return view('adminUserList',['users'=>$users]);
    }
    /**
     *Approve User function
     */
    public function approveUser($user_id){
//        dd('test')
        $user = User::find($user_id);
        $user->status = "Approved";
        $user->save();
        return redirect('admin/userList');
    }
    /*
     * add Author
     */
    public function addAuthorPage(){
        return view("addAuthorPage");
    }

    public function addAuthor(Request $request){
        $param = $request->all();
//        dd($param);
        $author = new Author;
        $author->last_name=$param['last_name'];
        $author->first_name=$param['first_name'];
        $author->book_name=$param['book_name'];
        $author->birth_date=$param['dob'];
        $author->nationality=$param['nation'];
        $author->save();

        return back()->withErrors('Author Created');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
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
}

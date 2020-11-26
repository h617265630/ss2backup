<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\Review;
use Illuminate\Support\Facades\Auth;
use DB;
class DuLiController extends Controller
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

    public function flow(){
        return view('duli.flow');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Book;
use App\User;
class Review extends Model
{
    protected $table = 'review';
    /*
     * one review has one user
     */
    public function user(){
        return $this->hasOne('App\Book');
    }
    /*
     * one review has one book
     */
    public function book(){
        return $this->belongsTo('App\Book');
    }
}

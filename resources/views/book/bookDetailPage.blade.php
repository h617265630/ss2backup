@extends('layouts.app')
@section('content')
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a  class="am-btn am-btn-default" href="{{url('/review/addReviewPage/')}}/{{$book->id}}"><span class="am-icon-plus"></span> Add a review</a>
                        </div>
                    </div>
                </div>
                <div class="am-u-sm-12 am-u-md-3">

                </div>
                <div class="am-u-sm-12 am-u-md-3">

                </div>
            </div>
            <br>
            <div class="am-g">
                <div class="am-u-md-6">
                    <div class="am-panel am-panel-default">
                        <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-1'}">Book Detail<span class="am-icon-chevron-down am-fr" ></span></div>
                        <div class="am-panel-bd am-collapse am-in" id="collapse-panel-1">
                            <ul class="am-list admin-content-file">
                                <li>
                                    <img class="am-img-circle am-img-thumbnail" src="{{asset($book['profile_address'])}}" style="height:100px;width:100px" alt=""/>
                                </li>
                                <li>
                                    <strong></span> Title</strong>
                                    <p>{{$book->title}}</p>
                                </li>
                                <li>
                                    <strong></span> Author</strong>
                                    <p>{{$book->author}}</p>
                                </li>
                                <li>
                                    <strong></span> Genre</strong>
                                    <p>{{$book->genre}}</p>
                                </li> <li>
                                    <strong></span> Published Year</strong>
                                    <p>{{$book->published_year}}</p>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>

                <div class="am-u-md-6">

                    <div class="am-panel am-panel-default">
                        <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-3'}">Reviews<span class="am-icon-chevron-down am-fr" ></span></div>
                        <div class="am-panel-bd am-collapse am-in am-cf" id="collapse-panel-3">
                            <ul class="am-comments-list admin-content-comment">

                                @foreach($reviews as $r)
                                <li class="am-comment">
                                    <a href="#"><img src="" alt="" class="am-comment-avatar" width="48" height="48"></a>
                                    <div class="am-comment-main">
                                        <header class="am-comment-hd">
                                            <div class="am-comment-meta"><a href="#" class="am-comment-author">{{$r->userName}}</a> post at <time><strong>{{$r->created_at}}</strong></time>
                                                Rating: <strong style="color:lightpink">{{$r->rating}}</strong></div>
                                        </header>
                                        <div class="am-comment-bd"><p>{{$r->content}}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                            <div class="am-fr">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>
    </div>
@endsection

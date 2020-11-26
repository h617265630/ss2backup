@extends('layouts.app')
@section('content')
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Book</strong> / <small><a href="{{url('/book/bookRecommendation')}}">Book Recommendation</a></small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    {{--<div class="am-btn-toolbar">--}}
                    {{--<div class="am-btn-group am-btn-group-xs">--}}
                    {{--<a  class="am-btn am-btn-default" href="{{url('/book/addBookPage')}}"><span class="am-icon-plus"></span> Add</a>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    {{--<div class="am-form-group">--}}
                    {{--<select data-am-selected="{btnSize: 'sm'}" onchange="window.location=this.value">--}}
                    {{--<option value="{{url('/')}}">Genre</option>--}}
                    {{--@foreach($genre as $g)--}}
                    {{--<option  value="{{url('/bookListByGenre')}}/{{$g->genre}}">{{$g->genre}}</option>--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--</div>--}}
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <form method="post" action="{{url('/search')}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="am-input-group am-input-group-sm">
                            <input type="text" name="search" class="am-form-field" required>
                            <span class="am-input-group-btn">
                                <button class="am-btn am-btn-default" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                </th><th class="table-id">ID</th ><th class="table-id">Profile</th><th class="table-title">Title<th class="table-type">Genre</th><th class="table-author am-hide-sm-only">Author</th><th class="table-date am-hide-sm-only">published_year</th>
                                {{--<th class="table-set">Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($book as $b)
                                <tr>
                                    <td>{{$b->id}}</td>
                                    {{--<td>{{$b->avgRating}}</td>--}}
                                    <td> <img class="am-img-circle am-img-thumbnail" src="{{asset($b->profile_address)}}" style="height:35px;width:35px" alt=""/></td>
                                    <td><a href="{{url('/book/bookDetail')}}/{{$b->id}}">{{$b->title}}</a></td>
                                    <td>{{$b->genre}}</td>
                                    <td class="am-hide-sm-only">{{$b->author}}</td>
                                    <td class="am-hide-sm-only">{{$b->published_year}}</td>
                                    {{--<td>--}}
                                    {{--<div class="am-btn-toolbar">--}}
                                    {{--<div class="am-btn-group am-btn-group-xs">--}}
                                    {{--<a href="{{url('/book/editBookPage')}}/{{$b->id}}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> Edit</a>--}}
                                    {{--<a href="{{url('/book/delete/')}}/{{$b->id}}" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> Delete</a>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{--<div class="am-fr">--}}
                        {{--{{ $book->links() }}--}}
                        {{--</div>--}}
                    </form>
                </div>
            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2020 INc Licensed under Griffith Web Authority.</p>
        </footer>

    </div>
@endsection
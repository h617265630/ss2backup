@extends('layouts.app')
@section('content')
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">User</strong> / <small>My Reviews</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-input-group am-input-group-sm">
                        <input type="text" class="am-form-field">
                        <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">Search</button>
          </span>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                </th><th class="table-id">ID</th><th class="table-title">Book Name<th class="table-type">Content</th><th class="table-set">Rating</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->bookName}}</td>
                                    <td><a href="{{url('/review/editReviewPage')}}/{{$v->id}}">{{$v->content}}</a></td>
                                    <td>{{$v->rating}}</td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                        <div class="am-fr">
                            {{ $reviews->links() }}
                        </div>
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
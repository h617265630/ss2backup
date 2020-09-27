@extends('layouts.app')
@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Review</strong> / <small>Edit Review</small></div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="am-form am-form-horizontal" method="post" action="{{url('/review/editReview')}}">
                <div class="am-g">
                    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">

                        <div class="am-panel am-panel-default">
                        </div>

                    </div>

                    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">Content</label>
                            <div class="am-u-sm-9">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{{$review->id}}">
                                <textarea class="form-control" id="deblock_udid" name="content" rows="16" } style="min-width: 90%">{{$review->content}}</textarea>
                                {{--<input type="text" id="title" name="content" placeholder="Content">--}}
                                <small>Please input the review content</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">Rating</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="Author" placeholder="rating" name="rating" value="{{$review->rating}}">
                                <small>Please rate</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary">Save</button>
                            </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>
        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2020 INc Licensed under Griffith Web Authority.</p>
        </footer>

    </div>
    <!-- content end -->
@endsection
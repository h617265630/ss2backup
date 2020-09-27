@extends('layouts.app')
@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Book</strong> / <small>Edit Book</small></div>
            </div>
            <hr/>
            <form class="am-form am-form-horizontal" method="post" action="{{url('/book/editBook')}}">
                <div class="am-g">
                    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
                        <div class="am-panel am-panel-default">
                            <div class="am-panel-bd">
                                <div class="am-g">
                                    <div class="am-u-md-4">
                                        <img class="am-img-circle am-img-thumbnail" src="" alt=""/>
                                        <input type="hidden" name="profile_address" value="none">
                                    </div>
                                    <div class="am-u-md-8">
                                        <p>你可以使用<a href="#">gravatar.com</a>提供的头像或者使用本地上传头像。 </p>
                                        <form class="am-form">
                                            <div class="am-form-group">
                                                <input type="file" id="user-pic">

                                                <p class="am-form-help">请选择要上传的文件...</p>
                                                <button type="button" class="am-btn am-btn-primary am-btn-xs">保存</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="am-panel am-panel-default">
                        </div>

                    </div>

                    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">Title</label>
                            <div class="am-u-sm-9">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{{$book->id}}">

                                <input type="text" id="title" name="title" placeholder="Title" value="{{$book->title}}">
                                <small>Please input the book title</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">Author</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="Author" placeholder="Author" name="author" value="{{$book->author}}">
                                <small>Please input the author name</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">Genre</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="Genre" placeholder="Genre" name="genre" value="{{$book->genre}}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-QQ" class="am-u-sm-3 am-form-label">Published Year</label>
                            <div class="am-u-sm-9">
                                <input type="date" id="p_year" placeholder="Published Year" name="p_year" value="{{$book->published_year}}">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary">submit</button>
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
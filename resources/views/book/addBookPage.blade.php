@extends('layouts.app')
@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Book</strong> / <small>Add Book</small></div>
            </div>

            <hr/>
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
                    <div class="am-panel am-panel-default">
                        <div class="am-panel-bd">
                            <div class="am-g">
                                <div class="am-u-md-4">
                                    <img class="am-img-circle am-img-thumbnail" src="{{asset($path)}}" style="height:100px;width:100px" alt=""/>

                                </div>
                                <div class="am-u-md-8">

                                    <form class="am-form" id="uploadForm" method="post" action="{{url('/book/uploadImage')}}" enctype ="multipart/form-data">
                                        <div class="am-form-group">
                                            <input type="file" name="picture"  id="user_pic" placeholder="choose file" required>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <p class="am-form-help">choose a picture as your book profile</p>
                                            <button type="submit" class="am-btn am-btn-primary am-btn-xs">upload</button>
                                        </div>
                                    </form>
                                </div>
                                <script type="text/javascript">

                                </script>
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
                    <form class="am-form am-form-horizontal" id="addBook" method="post" action="{{url('/book/addBook')}}">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">Title</label>
                            <div class="am-u-sm-9">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="text" id="title" name="title" placeholder="Title">
                                <small>Please input the book title</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">Author</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="Author" placeholder="Author" name="author">
                                <small>Please input the author name</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">Genre</label>
                            {{--<div class="am-u-sm-9">--}}
                                {{--<input type="text" id="Genre" placeholder="Genre" name="genre">--}}
                            {{--</div>--}}

                            <div class="am-u-sm-9">
                                <select data-am-selected="{btnSize: 'sm'}" name="genre" >
                                    @foreach($genre as $g)
                                        <option>{{$g->genre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-QQ" class="am-u-sm-3 am-form-label">Published Year</label>
                            <div class="am-u-sm-9">
                                <input type="date" id="p_year" placeholder="Published Year" name="p_year">
                                <input type="hidden" name="profile_address" value="{{$path}}" >
                                <input type="hidden" name="text" form="uploadForm" required>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2020 INc Licensed under Griffith Web Authority.</p>
        </footer>

    </div>
    <!-- content end -->

@endsection
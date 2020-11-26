@extends('layouts.app')
@section('content')
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Admin</strong> / <small>Add Author</small></div>
            </div>

            <hr/>
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
                    {{--<div class="am-panel am-panel-default">--}}
                        {{--<div class="am-panel-bd">--}}
                            {{--<div class="am-g">--}}
                                {{--<div class="am-u-md-4">--}}
                                    {{--<img class="am-img-circle am-img-thumbnail" src="{{asset($path)}}" style="height:100px;width:100px" alt=""/>--}}

                                {{--</div>--}}
                                {{--<div class="am-u-md-8">--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

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
                    <form class="am-form am-form-horizontal" id="addBook" method="post" action="{{url('/admin/addAuthor')}}">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">Last Name</label>
                            <div class="am-u-sm-9">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="text" id="title" name="last_name" placeholder="Last Name">
                                <small>Please input the Author's last name</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">First Name</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="Author" placeholder="First Name" name="first_name">
                                <small>Please input the author's first name</small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">Book Name</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="Author" placeholder="Book Name" name="book_name">
                                <small>Book name</small>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label for="user-QQ" class="am-u-sm-3 am-form-label">DOB</label>
                            <div class="am-u-sm-9">
                                <input type="date" id="p_year" placeholder="Date of Birth" name="dob">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-QQ" class="am-u-sm-3 am-form-label">Nationality</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="p_year" placeholder="Nationality" name="nation">
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
@extends('layouts.app')
@section('content')
    <div class="am-g">
        <div class="am-u-sm-12">
            <form class="am-form">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        </th><th class="table-id">ID</th><th class="table-title">Name<th class="table-type">Type</th><th class="table-author am-hide-sm-only">Status</th><th>Approve</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td>{{$u->id}}</td>

                            <td>{{$u->name}}</td>
                            <td>{{$u->user_type}}</td>
                            <td>{{$u->status}}</td>
                            <td><a href="{{url('/admin/approveUser')}}/{{$u->id}}">Approve</a></td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{--<div class="am-cf">--}}
                    {{--共 15 条记录--}}
                    {{--<div class="am-fr">--}}
                        {{--<ul class="am-pagination">--}}
                            {{--<li class="am-disabled"><a href="#">«</a></li>--}}
                            {{--<li class="am-active"><a href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                            {{--<li><a href="#">4</a></li>--}}
                            {{--<li><a href="#">5</a></li>--}}
                            {{--<li><a href="#">»</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <hr />
            </form>
        </div>
    </div>
@endsection
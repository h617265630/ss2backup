@extends('layouts.app')
@section('content')

    <div class="am-g">
        <div class="am-u-sm-12">
            <form class="am-form">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-id">ID</th ><th class="table-id">任务</th ><th class="table-id">其他</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>建站</td>
                            <td>主题风格，banner，整体布局</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>选品</td>
                            <td>产品定位，上传，产品文案内容整理，定价</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>SEO</td>
                            <td>关键字</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>营销推广</td>
                            <td> facebook 广告
                                Ins 广告</td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection

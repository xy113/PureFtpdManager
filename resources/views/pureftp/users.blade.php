@extends('layouts.default')

@section('title', '用户管理')

@section('content')
    <div class="console-title">
        <a href="{{url('user/edit')}}" class="submit f-right">添加用户</a>
        <h2>用户列表</h2>
    </div>
    <div class="table-wrap">
        <form method="post" action="">
            @csrf
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="listtable">
                <thead>
                <tr>
                    <th width="20">选</th>
                    <th width="160">账号</th>
                    <th>目录</th>
                    <th width="100">磁盘限额</th>
                    <th width="100">上传限速</th>
                    <th width="100">下载限速</th>
                    <th width="40">编辑</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><input type="checkbox" class="checkbox checkmark" name="delete[]" value="{{$item->userid}}" /></td>
                        <th>{{$item->User}}</th>
                        <td>{{$item->Dir}}</td>
                        <td>{{$item->QuotaSize}}MB</td>
                        <td>{{$item->ULBandwidth}}KB/s</td>
                        <td>{{$item->ULBandwidth}}KB/s</td>
                        <td><a href="{{url('user/edit?userid='.$item->userid)}}">编辑</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="12">
                        <label><input type="checkbox" class="checkbox checkall" /> 全选</label>
                        <label><input type="radio" name="option" value="delete" checked> 删除</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="12">
                        <span class="pages">{{$pagination}}</span>
                        <input type="submit" class="button" value="提交" />
                        <input type="button" class="button cancel" value="刷新" onclick="window.location.reload()" />
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
@stop

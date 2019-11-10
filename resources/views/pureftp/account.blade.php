@extends('layouts.default')

@section('title', '系统账户')

@section('content')
    <div class="console-title">
        <a href="{{url('admin/account/edit')}}" class="submit f-right">添加账户</a>
        <h2>账户列表</h2>
    </div>
    <div class="table-wrap">
        <form method="post" action="">
            @csrf
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="listtable">
                <thead>
                <tr>
                    <th width="20">选</th>
                    <th width="200">账号</th>
                    <th>电子邮箱</th>
                    <th width="140">登录时间</th>
                    <th width="40">编辑</th>
                </tr>
                </thead>
                <tbody id="members">
                @foreach ($items as $item)
                    <tr>
                        <td><input type="checkbox" class="checkbox checkmark" name="delete[]" value="{{$item->userid}}" /></td>
                        <th>{{$item->username}}</th>
                        <td>{{$item->email}}</td>
                        <td>{{$item->updated_at->format('Y-m-d H:i:s')}}</td>
                        <td><a href="{{url('admin/account/edit?userid='.$item->userid)}}">编辑</a></td>
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
                        <input type="submit" class="button" value="提交" />
                        <input type="button" class="button cancel" value="刷新" onclick="window.location.reload()" />
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>

@stop

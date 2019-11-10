@extends('layouts.default')

@section('title', '')

@section('content')
    <div class="console-title">
        <a href="{{url('admin/account')}}" class="submit f-right">账户列表</a>
        <h2>添加账户</h2>
    </div>
    <div class="table-wrap">
        <form method="post">
            @csrf
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="formtable">
                <tbody>
                <tr>
                    <td style="width:60px; text-align:right; padding-right:20px;">账号</td>
                    <td><input type="text" class="input-text" name="user[username]" value="{{$user->username}}" required></td>
                </tr>
                <tr>
                    <td style="width:60px; text-align:right; padding-right:20px;">邮箱</td>
                    <td><input type="text" class="input-text" name="user[email]" value="{{$user->email}}" required></td>
                </tr>
                <tr>
                    <td style="width:60px; text-align:right; padding-right:20px;">密码</td>
                    <td><input type="password" class="input-text" name="user[password]"></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn-submit" class="submit" value="提交" /></td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
@stop

@extends('layouts.default')

@section('title', '编辑用户')

@section('content')
    <div class="console-title">
        <a href="{{url('user')}}" class="submit f-right">用户列表</a>
        <h2>编辑用户</h2>
    </div>
    <div class="area">
        <form method="post" id="Form">
            @csrf
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="formtable">
                <tbody>
                <tr>
                    <td width="60">账号</td>
                    <td><input type="text" class="input-text" name="newuser[User]" value="{{$user->User}}" id="User" /></td>
                </tr>
                <tr>
                    <td>密码</td>
                    <td>
                        <input type="text" class="input-text" name="newuser[Password]" value="" id="Password" />
                        <a href="javascript:;" id="createPass">生成密码</a>
                        @if ($user->userid)
                            <span>不修改请留空</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>用户ID</td>
                    <td><input type="text" class="input-text" name="newuser[Uid]" value="{{$user->Uid??'1000'}}" /></td>
                </tr>
                <tr>
                    <td>组ID</td>
                    <td><input type="text" class="input-text" name="newuser[Gid]" value="{{$user->Gid??'1000'}}" /></td>
                </tr>
                <tr>
                    <td>目录</td>
                    <td><input type="text" class="input-text" name="newuser[Dir]" value="{{$user->Dir}}" id="Dir" /></td>
                </tr>
                <tr>
                    <td>状态</td>
                    <td>
                        <label><input type="radio" name="newuser[Status]" value="1"{{$user->Status ? ' checked' : ''}}/> 可用</label>
                        <label><input type="radio" name="newuser[Status]" value="0"{{!$user->Status ? ' checked' : ''}}/> 不可用</label>
                    </td>
                </tr>
                <tr>
                    <td>磁盘限额</td>
                    <td><input type="text" class="input-text" name="newuser[QuotaSize]" value="{{$user->QuotaSize??'100'}}" /> MB</td>
                </tr>
                <tr>
                    <td>上传限速</td>
                    <td><input type="text" class="input-text" name="newuser[ULBandwidth]" value="{{$user->ULBandwidth??'100'}}" /> KB/S</td>
                </tr>
                <tr>
                    <td>下载限速</td>
                    <td><input type="text" class="input-text" name="newuser[DLBandwidth]" value="{{$user->DLBandwidth??'100'}}" /> KB/S</td>
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

@section('foot')
    <script type="text/javascript">
        $("#createPass").click(function(e) {
            $("#Password").val(DSXUtil.randomString(10));
        });
    </script>
@stop

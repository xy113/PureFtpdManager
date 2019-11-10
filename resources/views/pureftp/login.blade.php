<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>大师兄PureFTP管理系统</title>
    <style type="text/css">
        body {
            padding: 0;
            margin: 0;
            font: 12px Arial;
            background-color: #CCC;
            background-size: cover;
            position: relative;
        }

        a:link, a:active, a:visited {
            color: #333333;
            text-decoration: none;
        }

        a:hover {
            color: #FF0000;
            text-decoration: underline;
        }

        .login-wrap {
            background: #fff;
            border-radius: 5px;
            margin: 100px auto;
            width: 400px;
            box-shadow: 0 3px 5px #333;
        }

        .login-wrap .title {
            font-size: 20px;
            margin: 0 0 10px 0;
            padding: 20px 0;
            text-align: center;
            border-radius: 5px 5px 0 0;
            border-bottom: 1px #eee solid;
        }

        .login-wrap .item {
            padding: 15px 0;
            text-align: center;
        }

        .login-wrap .input-text {
            font-size: 14px;
            width: 260px;
            padding: 5px 0;
            border-radius: 2px;
            height: 40px;
            text-align: center;
            box-sizing: border-box;
            border: 1px #CCC solid;
        }

        .login-wrap .input-text:hover {
            border-color: #09C;
            background-color: #f9f9f9;
        }

        .login-wrap .button {
            width: 270px;
            height: 40px;
            line-height: 40px;
            margin-bottom: 20px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            background: #C30;
            border-radius: 3px;
            color: #fff;
            text-align: center;
            display: inline-block;
            box-sizing: border-box;
            border: 0;
        }

        .login-wrap .button:hover {
            background: #C03;
        }

        .login-wrap .err {
            color: #F00;
            text-align: center;
            font-size: 12px;
            display: none;
        }

        .copyright {
            position: fixed;
            bottom: 30px;
            width: 100%;
            display: block;
            text-align: center;
        }

        .copyright, .copyright *, .copyright a {
            font: 400 12px Arial;
            color: #fff;
        }
    </style>
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/common.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.form.js')}}"></script>
</head>
<body>
<div class="login-wrap">
    <form method="post">
        @csrf
        <h1 class="title">大师兄PureFTP管理系统</h1>
        @if ($errors->has('username'))
            <div class="err" role="alert">{{$errors->first('username')}}</div>
        @endif
        @if ($errors->has('password'))
            <div class="err" role="alert">{{$errors->first('password')}}</div>
        @endif
        <div class="item"><input type="text" name="username" class="input-text" placeholder="用户名/邮箱" required></div>
        <div class="item"><input type="password" name="password" class="input-text" placeholder="密码" required></div>
        <div class="item">
            <button class="button">登录</button>
        </div>
    </form>
</div>
<p class="copyright">&copy;{{date('Y')}} <a href="http://www.gzdsx.cn" target="_blank">贵州大师兄信息技术有限公司</a> 版权所有，并保留所有权利。
</p>
</body>
</html>

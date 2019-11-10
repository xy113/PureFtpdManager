<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>后台管理中心</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/common.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.dsxui.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.form.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui-1.10.4.custom.min.js')}}"></script>
</head>

<body style="padding:0 20px 20px; position:relative;">
@yield('content')
<div id="footer">
    <p></p>
    <p>©{{date('Y')}} <a href="http://www.songdewei.com" target="_blank">贵州大师兄信息技术有限公司</a> 版权所有，并保留所有权利。</p>
</div>
<div class="blank"></div>
@yield('foot')
</body>
</html>

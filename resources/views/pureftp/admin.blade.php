<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>大师兄CMS后台管理中心</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <script src="{{asset('js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.form.js')}}" type="text/javascript"></script>
</head>

<body style="overflow:hidden; position:relative;">
<div class="header">
    <div class="f-right" style="margin-right:20px;">
        <a href="/" class="menuitem">您好,{{auth()->user()->username}}</a> |
        <a href="logout" class="menuitem">退出登录</a>
    </div>
    <div class="item" id="home">
        <a href="/" class="menuitem"><i class="icon">&#xf012b;</i>HOME</a>
        <ul class="submenu">
            <li><a href="/" target="_blank">站点首页</a></li>
            <li><a href="#">关于我们</a></li>
            <li><a href="#">技术支持</a></li>
            <li><a href="#">开发文档</a></li>
        </ul>
    </div>
</div>
<div class="sidebar">
    <div id="sidebar-content">
        <h3><a href="javascript:;"><i class="icon">&#xf012d;</i>用户管理</a></h3>
        <ul>
            <li><a rel="item" href="admin/account" target="main">系统账号管理</a></li>
            <li><a rel="item" href="user" target="main">FTP账户管理</a></li>
        </ul>
    </div>
</div>
<div class="mainframe"><iframe name="main" frameborder="0" class="iframe" src="wellcome"></iframe></div>

<script type="text/javascript">
    $(".item").mouseenter(function(){$(this).addClass("cur").find("ul").show();}).mouseleave(function(){$(this).removeClass("cur").find("ul").hide();});
    $("#sidebar-content h3").click(function(){
        var ul = $(this).siblings("ul")[$(this).index("h3")];
        if($(ul).is(":visible")){
            $(ul).slideUp('fast');
        }else {
            $(ul).slideDown('fast');
        }
    });
    $("a[rel=item]").click(function(){
        $("a[rel=item]").removeClass('on');
        $(this).addClass('on');
    });
</script>
</body>
</html>

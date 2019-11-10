@extends('layouts.default')

@section('title', '欢迎')

@section('content')
    <style type="text/css">html,body{background-color:#f2f2f2;}</style>
    <h2 class="about-h2-title">欢迎使用大师兄PureFTP管理系统</h2>
    <div class="area">
        <div class="about-left">
            <div class="about-content">
                <div class="content-title">关注大师兄</div>
                <p></p>
                <p>QQ:307718818</p>
                <p>邮箱:songdewei@163.com</p>
                <p>微信:大师兄网络服务平台</p>
                <p><img src="{{asset('images/weixin.jpg')}}" width="150" height="150"></p>
                <p></p>
            </div>
        </div>
        <div class="about-right">
            <div class="about-content">
                <div class="content-title">大师兄新闻</div>
                <div class="textfield"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@stop

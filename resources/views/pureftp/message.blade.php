@extends('layouts.default')

@section('title', '系统提示')

@section('content')
    <div class="sysmessage">
        <h3 class="$type">{{$message??'信息保存成功'}}</h3>
        <div class="tips">{{$tips??'请点击下面的链接继续操作'}}</div>
        <div class="links">
            @if ($links)
                @foreach ($links as $link)
                    <a href="{{$link[1]??''}}" target="{{$link[2]??''}}">{{$link[0]}}</a>
                @endforeach
            @else
                <a href="{{redirect()->back()->getTargetUrl()}}">返回上一页</a>
            @endif

        </div>
    </div>
@stop

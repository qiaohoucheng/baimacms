<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $page_title or "BaimaCMS" }}</title>
    @include('admin.default.layouts.css')
    @yield('css')
    @include('admin.default.layouts.js')
</head>
<body class="layui-layout-body">
<div id="LAY_app" class="layadmin-tabspage-none ">
<div  class="layui-layout layui-layout-admin">
    <!-- 头部区域 -->
    <div class="layui-header">
        @include('admin.default.layouts.header')
    </div>
    <!-- 侧边栏区域 -->
    <div class="layui-side layui-bg-black">
        @include('admin.default.layouts.sidebar')
    </div>

    <div class="layui-body">
        <div class="layui-card layadmin-header">
            <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
                @if( isset($a) )
                    <a href="#">{{ $a }}</a>
                @endif
                @if( isset($b) )
                    <span lay-separator="">/</span>
                    <a href="{{ url('/'.$jumpb) }}">{{ $b }}</a>
                @endif
                @if( isset($a) && isset($c) && $a!='')
                    <span lay-separator="">/</span>
                    <a><cite>{{ $c }}</cite></a>
                @endif
            </div>
        </div>
        <!-- 内容主体区域 -->
        @yield('content')
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        @include('admin.default.layouts.footer')
    </div>
</div>
<div class="layui-layer-shade" id="layui-layer-shade2" times="2" style="z-index: 19891015; background-color: rgb(0, 0, 0); opacity: 0.1; display: none" ></div>
<div class="layui-layer layui-layer-page layui-anim layui-anim-rl layui-layer-adminRight" id="layer2" type="page" times="2" showtime="0" contype="string" style="z-index: 19891016; width: 300px; top: 25px; left: 1620px; display: none">
<div id="LAY_adminPopupAbout" class="layui-layer-content">
    <div class="layui-card-header">公告</div>
    <div class="layui-card-body layui-text layadmin-about">
        <blockquote class="layui-elem-quote" style="border: none;">
            layuiAdmin 受国家计算机软件著作权保护（登记号：2018SR410669），未经官网正规渠道授权擅自公开产品源文件、以及直接对产品二次出售的，我们将保留追究法律责任的权利。
        </blockquote>
    </div>
</div>
</div>
</div>
<script>
    layui.config({
        base: '/layui/layadmin/',
        version: '1.0.0'
    }).use('indexs');
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
    layui.use(['jquery','layer'],function (e) {
        $('#layui-layer-shade2').on('click',function(){
            $('#layer2').addClass("layui-anim-lr").removeClass("layui-anim-rl");
            $(this).hide();
        })
    })
    //测试 onevent event
    layui.use(['jquery', 'util'], function () {
        var $ = layui.$;
        var util = layui.util;
        var active = {
            about:function(){
                layui.event("about","pop(filter)",{
                    'id':1,
                    'name':'测试',
                })
            }
        }
        layui.onevent("about", "pop(filter)", function (params) {
            $('#layer2').show();
            $('#layui-layer-shade2').show();
            $('#layer2').addClass("layui-anim-rl").removeClass("layui-anim-lr");
        });

        $('.layui-nav-item').on('click','a',function(){
            var elem  = $(this);
            var event = $(this).attr('lay-even');
            typeof active[event] === 'function' && active[event].apply(this);
        })
    });
</script>
</body>
</html>

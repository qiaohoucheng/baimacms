<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $page_title or "中艺联合美术院会员申报系统" }}</title>
    @include('admin.layouts.css')
    @yield('css')
    @include('admin.layouts.js')
</head>
<body class="layui-layout-body">
<div  class="layui-layout layui-layout-admin">
    <!-- 头部区域 -->
    <div class="layui-header">
        @include('admin.layouts.header')
    </div>
    <!-- 侧边栏区域 -->
    <div class="layui-side layui-bg-black">
        @include('admin.layouts.sidebar')
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        @yield('content')
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        @include('admin.layouts.footer')
    </div>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
</body>
</html>

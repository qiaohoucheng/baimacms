@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <div class="pull-right">
                            <a href="{{ url('/website-nav/create') }}" class="layui-btn layui-btn-sm" >新增导航</a>
                        </div>
                    </div>
                    <div class="layui-card-body">
                        <div class="layui-btn-group">
                            <button class="layui-btn layui-btn-sm" id="btn-expand">全部展开</button>
                            <button class="layui-btn layui-btn-sm" id="btn-fold">全部折叠</button>
                        </div>
                        <!-- 搜索 -->
                        {{--<form class="layui-form" action="">--}}
                            {{--<div class="demoTable">--}}
                                {{--（姓名/手机号/身份证号）--}}
                                {{--&nbsp;--}}
                                {{--<div class="layui-inline">--}}
                                    {{--<input class="layui-input" placeholder="姓名" name="keyword" id="keyword" autocomplete="off" >--}}
                                {{--</div>--}}
                                {{--<button class="layui-btn " type="button" data-type="reload" id="search-btn">搜索</button>--}}
                                {{--<div class="layui-col-md1">--}}
                                    {{--<select name="status" lay-filter="status">--}}
                                        {{--<option value="">全部</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                        {{--<hr>--}}
                        <!-- 表格 -->
                        <table id="nav-table" class="layui-table" lay-filter="work"></table>
                        <script type="text/html" id="hidebox">
                            @{{#  if(d.is_hide == 1){ }}
                            隐藏
                            @{{#  }else{ }}
                            显示
                            @{{#  } }}
                        </script>
                        <script type="text/html" id="sbox">
                            @{{#  if(d.status == 1){ }}
                            正常
                            @{{#  }else{ }}
                            已删除
                            @{{#  } }}
                        </script>
                        <script type="text/html" id="barDemo">
                            <a class="layui-btn layui-btn-sm"  lay-event="edit">编辑</a>
                            <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        layui.use(['table','form','layer','treetable'], function(){
            var table = layui.table;
            var form  = layui.form;
            var layer = layui.layer;
            var token = '{{ csrf_token() }}';
            var treetable = layui.treetable;
            var postUrl = '/website-nav/';
            treetable.render({
                treeColIndex: 2,
                treeSpid: 0,
                treeIdName: 'id',
                treePidName: 'pid',
                treeDefaultClose: true,
                treeLinkage: true,
                elem: '#nav-table',
                url: postUrl,
                cols: [[
                    {type: 'numbers'},
                    {field: 'id', width:60,title:'ID'},
                    {field: 'title', title: '名称'},
                    {field: 'url', title: '路由'},
                    {field:'is_hide', width:150,title:'是否隐藏', templet:'#hidebox'},
                    {field:'sort',width:80,align:'center',title:'排序'},
                    {fixed: 'right',width:150, align:'center',toolbar: '#barDemo',title:'操作'}
                ]]
            });
            $('#btn-expand').click(function () {
                treetable.expandAll('#nav-table');
            });

            $('#btn-fold').click(function () {
                treetable.foldAll('#nav-table');
            });
            //监听工具条
            table.on('tool(work)', function(obj){
                var data = obj.data;
                if(obj.event === 'del'){
                    layer.confirm('真的删除这条数据吗', function(index){
                        $.post(postUrl+data.id,{'id':data.id,'_token':token,'_method':'DELETE'},function(e){
                            layer.msg(e.message);
                            if(e.code ==200){
                                obj.del();
                                setTimeout(function(){//两秒后跳转
                                    $(".layui-laypage-btn").click()
                                },1000);
                            }
                        })
                        //
                        layer.close(index);
                    });
                }
                if(obj.event === 'edit'){

                    //layer.alert('编辑行：<br>'+ JSON.stringify(data))
                }
            });
        });
    </script>
@endsection
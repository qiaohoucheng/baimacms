@extends('admin.default.home')
@section('css')
    <style>
        .layui-table td .layui-table-cell{
            height:50px;
            line-height: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <div class="pull-right">
                            <a href="{{ url('/power-users/create') }}" class="layui-btn layui-btn-sm" >添加角色</a>
                        </div>
                    </div>
                    <div class="layui-card-body">
                        <!-- 表格 -->
                        <table class="layui-table" id="bannerTable" lay-filter="banner">
                        </table>
                        <script type="text/html" id="picbox">
                            <div class="photo-box" data-str='@{{ JSON.stringify(d.post) }}'>
                                <img src="@{{  d.post.url }}">
                            </div>
                        </script>
                        <script type="text/html" id="sbox">
                            @{{#  if(d.status == 1){ }}
                            <span class=" layui-badge layui-bg-blue">发布</span>
                            @{{#  }else{ }}
                            <span class=" layui-badge layui-bg-red">未发布</span>
                            @{{#  } }}
                        </script>
                        <script type="text/html" id="barDemo">
                            <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                            <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        layui.use(['table','form','layer'], function(){
            var table = layui.table;
            var layer = layui.layer;
            var token = '{{ csrf_token() }}';
            var postUrl = '/power-users';
            //获取数据
            table.render({
                elem: '#bannerTable',
                page:{curr: location.hash.replace('#!page=', ''),hash:'page'},
                url:postUrl,
                limit:'20',
                cols: [[
                    {field:'id', width:60,title:'ID'}
                    ,{field:'name',  width:200,title:'姓名'}
                    ,{field:'email',title:'邮箱'}
                    ,{field:'permissions',title:'角色'}
                    ,{field:'created_at' ,title:'创建时间'}
                    ,{field:'status',title:'状态', templet:'#sbox'}
                    ,{fixed:'right',align:'center', toolbar: '#barDemo',title:'操作'}
                ]],
                done: function(res){

                }
            });
            table.on('tool(banner)', function(obj){
                var data = obj.data;
                if(obj.event === 'del'){
                    layer.confirm('您确定要删除这条轮播图吗？', function(index){
                        $.post(postUrl+'/'+data.id,{'id':data.id,'_token':token,'_method':'DELETE'},function(e){
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
                if(obj.event ==='edit'){
                    window.location.href=postUrl+'/'+data.id+'/edit';
                }
            });
        });
    </script>
@endsection
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
                            <a href="{{ url('/power-menu/create') }}" class="layui-btn layui-btn-sm" >新增菜单</a>
                        </div>
                    </div>
                    <div class="layui-card-body">
                        <!-- 搜索 -->
                        <form class="layui-form" action="">
                            <div class="demoTable">
                                {{--（姓名/手机号/身份证号）--}}
                                &nbsp;
                                <div class="layui-inline">
                                    <input class="layui-input" placeholder="姓名" name="keyword" id="keyword" autocomplete="off" >
                                </div>
                                <button class="layui-btn " type="button" data-type="reload" id="search-btn">搜索</button>
                                <div class="layui-col-md1">
                                    <select name="status" lay-filter="status">
                                        <option value="">全部</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <!-- 表格 -->
                        <table class="layui-table" id="idTest" lay-filter="work">
                        </table>
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
        layui.use(['table','form','layer'], function(){
            var table = layui.table;
            var form  = layui.form;
            var layer = layui.layer;
            var token = '{{ csrf_token() }}';

            //获取数据
            table.render({
                elem: '#idTest',
                page:{curr: location.hash.replace('#!page=', ''),hash:'page'},
                url:'/power-menu',
                cols: [[
                    {field:'id', width:60, fixed: true,title:'ID'}
                    ,{field:'title', width:200,title:'名称'}
                    ,{field:'pid',  width:120,align:'center',title:'上级菜单'}
                    ,{field:'url', width:250,title:'路由'}
                    ,{field:'sort',width:80,align:'center',title:'排序'}
                    ,{field:'is_hide', width:150,title:'是否隐藏', templet:'#hidebox'}
                    ,{field:'created_at', width:200,title:'创建时间'}
                    ,{field:'status', width:150,title:'状态', templet:'#sbox'}
                    ,{fixed: 'right',  align:'center', toolbar: '#barDemo',title:'操作'}
                ]],
                done: function(res){

                }
            });

            //监听select
            form.on('select(status)', function(data){
                window.location.href='/application/index?status='+data.value;
            });
            //监听表格复选框选择
            table.on('checkbox(work)', function(obj){
                //console.log(obj)
            });
            //监听工具条
            table.on('tool(work)', function(obj){
                var data = obj.data;
                if(obj.event === 'detail'){
                    window.location.href='/application/detail/'+data.zyaid;
                }
                if(obj.event === 'del'){
                    layer.confirm('真的删除行么', function(index){
                        obj.del();
                        layer.close(index);
                    });
                }
                if(obj.event === 'edit'){
                    if(data.zyaid >0){
                        var token = '{{ csrf_token() }}';
                        layer.confirm('是否通过审核？', {
                            btn: ['通过','拒绝'] //按钮
                        }, function(){
                            $.post('/application/review',{'id':data.zyaid,'_token':token,'status':2},function(obj){
                                layer.msg(obj.message);
                                if(obj.code ==1){
                                    setTimeout(function(){//两秒后跳转
                                        $(".layui-laypage-btn").click()
                                    },2500);
                                }
                            })
                        }, function(){
                            $.post('/application/review',{'id':data.zyaid,'_token':token,'status':3},function(obj){
                                layer.msg(obj.message);
                                if(obj.code ==1){
                                    setTimeout(function(){//两秒后跳转
                                        $(".layui-laypage-btn").click()
                                    },2500);
                                }
                            })
                        });
                    }
                    //layer.alert('编辑行：<br>'+ JSON.stringify(data))
                }
            });
        });
    </script>
@endsection
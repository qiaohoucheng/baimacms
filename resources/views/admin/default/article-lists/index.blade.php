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
                            <a href="{{ url('/article-lists/create') }}" class="layui-btn layui-btn-sm" >添加文章</a>
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
                        <script type="text/html" id="tagsbox">

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
            var postUrl = '/article-lists';
            //获取数据
            table.render({
                elem: '#bannerTable',
                page:{curr: location.hash.replace('#!page=', ''),hash:'page'},
                url:postUrl,
                limit:'20',
                where:{field:'id'},
                cols: [[
                    {field:'id', width:60, fixed: true,title:'ID'}
                    ,{field:'title',  width:300,align:'center',title:'标题'}
                    ,{field:'category_id',title:'分类',templet:function(d){
                        if(d.category_id >0){
                            var name =  d.category.title;
                            return name;
                        }
                        return '';
                    }}
                    ,{field:'tags',title:'标签', templet:function(d){
                        var tags_arr = new Array();
                        if(d.tags){
                            tags_arr = d.tags.split(",");
                            if(tags_arr.length > 0){
                                var html='<div>';
                                $.each(tags_arr,function(i,v){
                                    html+='<span class=" layui-badge layui-bg-gray">'+v+'</span> ';
                                })
                                html+='</div>';
                                return html;
                            }
                        }
                        return '';
                    }}
                    ,{field:'created_at', width:200,title:'创建时间'}
                    ,{field:'weight',title:'权重'}
                    ,{field:'status', width:150,align:'center',title:'状态', templet:'#sbox'}
                    ,{fixed:'right', width:300,align:'center', toolbar: '#barDemo',title:'操作'}
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
                if(obj.event ==='up'){
                    var id1 = data.id;
                    var id2 = $(this).parents('tr').prev().find('.up').data('id');
                    if(id2 == undefined || id1 == undefined){
                        layer.msg('已经到顶了');
                    }else{
                        $.post('website-carousel/move',{'id1':id1,'id2':id2,'_token':token},function(data){
                            if(data.code==200){
                                $(".layui-laypage-btn").click();
                            }
                        });
                    }
                }
                if(obj.event ==='down'){
                    var id1 = data.id;
                    var id2 = $(this).parents('tr').next().find('.up').data('id');
                    if(id2 == undefined || id1 == undefined){
                        layer.msg('已经到底了');
                    }else{
                        $.post('/website-carousel/move',{'id1':id1,'id2':id2,'_token':token},function(data){
                            if(data.code==200){
                                $(".layui-laypage-btn").click();
                            }
                        });
                    }
                }
            });
            $(document).on('click','.photo-box',function(){
                var jsonstr = $(this).data('str');
                if(jsonstr){
                    var photostr ='{"title":"轮播图","id":"1","start":"0","data":[{"alt":"'+jsonstr.filename+'","pid":"'+jsonstr.id+'","src":"'+jsonstr.url+'","thumb":"'+jsonstr.url+'"}]}';
                    layer.photos({
                        photos: JSON.parse(photostr)
                        ,anim: 5
                    });
                }
            })
        });
    </script>
@endsection
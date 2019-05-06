@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md9">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <h3>文章信息</h3>
                        <div class="pull-right">
                        </div>
                    </div>
                    <div class="layui-card-body">
                        <form class="layui-form layui-form-pane" action="{!!  '/article-lists' !!}" method="POST" id="banner_create">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="pic_id" id="pic_id" value="0"/>
                            <div class="layui-form-item">
                                <label class="layui-form-label">标题</label>
                                <div class="layui-input-block">
                                    <input type="text" name="title" autocomplete="off"  lay-verify="required" placeholder="请输入标题" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                            <textarea id="txt" style="display: none;"></textarea>
                            </div>
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">发布状态</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="status" value="1" title="发布" checked="">
                                    <input type="radio" name="status" value="0" title="未发布">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="save">保存</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/article-lists') }}">返回</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="layui-col-md3">
                <form class="layui-form layui-form-pane" action="{!!  '/article-lists' !!}" method="POST" >
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <h3>分类目录</h3>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="layui-card-body">
                            <div class="layui-form-item">

                                 <input type="text" name="title" autocomplete="off"  lay-verify="required" placeholder="请输入标题" class="layui-input">
                            </div>
                        </div>
                    </div>
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <h3>标签</h3>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="layui-card-body">
                            <div class="layui-form-item">
                                <input type="text" name="title" autocomplete="off"  lay-verify="required" placeholder="请输入标题" class="layui-input">
                            </div>
                        </div>
                    </div>
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <h3>展示图片</h3>
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="layui-card-body">
                            <div class="layui-form-item " style="text-align: center">
                                <div class="layui-upload-drag" id="up">
                                    <i class="layui-icon"></i>
                                    <p>点击上传，或将文件拖拽到此处</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        layui.use(['form','upload','jquery','layedit'], function(){
            var form = layui.form;
            var layer = layui.layer;
            var $ = layui.jquery;
            var upload = layui.upload;
            var token = '{{ csrf_token() }}';
            var jumpurl = '/website-carousel';
            var layedit = layui.layedit;

            layedit.set({
                uploadImage: {
                    url: '/file/upload'
                    ,type: 'post' //默认post
                    ,data:{'_token':token}
                }
            });
            layedit.build('txt',{
                height: 400
            }); //建立编辑器
            upload.render({
                elem: '#up'
                ,url: '/file/upload'
                ,size: 4000 //限制文件大小，单位 KB
                ,data:{'_token':token}
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#up').html('<img src="'+result+'">');
                    });
                }
                ,done: function(res){
                    if(res.code == 1){
                        $('#pic_id').val(res.data.pic_id);
                        return layer.msg('上传成功');
                    }else{
                        return layer.msg('上传失败');

                    }
                }
                ,error: function(){
                    //演示失败状态，并实现重传

                }
            });
            //监听提交
            form.on('submit(save)', function(data){
                var thisform = $('#banner_create');
                console.log(JSON.stringify(data.field));
                $.post(thisform.attr('action'),data.field,function(data){
                    layer.msg(data.message);
                    if(data.code ==200){
                        setTimeout(function(){//两秒后跳转
                            window.location.href= jumpurl;
                        },1000);
                    }
                })
                return false;
            });
        });
    </script>
@endsection
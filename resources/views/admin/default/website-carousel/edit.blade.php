@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <h3>基本信息</h3>
                        <div class="pull-right">

                        </div>
                    </div>
                    <div class="layui-card-body">
                        <form class="layui-form layui-form-pane" action="{!!  url('/website-carousel/'.$id) !!}" method="POST" id="banner_create">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="_method" value="PUT"/>
                            <input type="hidden" name="pic_id" id="pic_id" value="{{ $info['pic_id'] or 0 }}"/>
                            <div class="layui-form-item">
                                <label class="layui-form-label">标题</label>
                                <div class="layui-input-block">
                                    <input type="text" value="{{ $info['title'] }}" name="title" autocomplete="off"  lay-verify="required" placeholder="请输入标题" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">链接</label>
                                <div class="layui-input-block">
                                    <input type="text" value="{{ $info['link'] }}" name="link" autocomplete="off"  lay-verify="required" placeholder="请输入轮播图链接" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">图片</label>
                                <div class="layui-input-block" style="padding-left:10px;">
                                    <div class="layui-upload-drag" id="up">
                                        @if(isset($info['post']))
                                            <img src="{{ $info['post']['url'] }}" alt="">
                                        @else
                                            <i class="layui-icon"></i>
                                            <p>点击上传，或将文件拖拽到此处</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">发布状态</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="status" value="1" title="发布" @if($info['status'] != 0) checked="" @endif>
                                    <input type="radio" name="status" value="0" title="未发布" @if($info['status'] == 0) checked="" @endif>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button class="layui-btn" lay-submit="" lay-filter="save">保存</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/website-carousel') }}">返回</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        layui.use(['form','upload','jquery'], function(){
            var form = layui.form;
            var layer = layui.layer;
            var $ = layui.jquery;
            var upload = layui.upload;
            var token = '{{ csrf_token() }}';

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
                        setTimeout(function(){
                            window.location.href="/website-carousel";
                        },1200)
                    }
                })
                return false;
            });
        });
    </script>
@endsection
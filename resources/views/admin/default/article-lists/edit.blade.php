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
                        <form class="layui-form layui-form-pane" action="{!!  '/article-lists' !!}" method="POST" id="article_create">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="pic_id" id="pic_id" value="0"/>
                            <div class="layui-form-item">
                                <label class="layui-form-label">标题</label>
                                <div class="layui-input-block">
                                    <input type="text" name="title" autocomplete="off"  lay-verify="required" placeholder="请输入标题" class="layui-input" id="title" value="{{ $info['title'] }}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <span id="txt"></span>
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
                                <select name="interest" lay-filter="category" id="category">
                                    <option value=""></option>
                                    @foreach($category_tree as $k =>$v)
                                        <option value="{{ $v['id'] }}" @if($info['category_id'] == $v['id'] )  selected @endif>{{ $v['title'] }}</option>
                                        @if(isset($v['_child']))
                                            @foreach($v['_child'] as $kk =>$vv)
                                                <option value="{{ $vv['id'] }}" @if($info['category_id'] == $vv['id'] )  selected @endif>{!! '&nbsp;&nbsp;'.$vv['title'] !!} </option>
                                            @endforeach
                                        @endif

                                    @endforeach
                                </select>
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
                                <div  class="tags" id="tags">
                                    <input type="text" name="tags" id="inputTags" placeholder="回车生成标签" autocomplete="off">
                                </div>
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
    <script type="text/javascript" src="/plugins/wangEditor/release/wangEditor.min.js"></script>
    <script>
        var token ='{{ csrf_token() }}';
        var E = window.wangEditor;
        var editor = new E('#txt');
        editor.customConfig.uploadImgServer = '/file/upload';  // 上传图片到服务器
        // 3M
        editor.customConfig.uploadImgMaxSize = 5 * 1024 * 1024;
        // 限制一次最多上传 5 张图片
        editor.customConfig.uploadImgMaxLength = 5;
        // 自定义文件名
        editor.customConfig.uploadFileName = 'file';
        editor.customConfig.uploadImgTimeout = 5000;
        editor.customConfig.uploadImgParams = {
            _token: token,
            is_editor:1,
        }
        editor.create();
        editor.txt.html('{!! $info['content'] !!}');
        layui.use(['form','upload','jquery','layedit','inputTags'], function(){
            var form = layui.form;
            var layer = layui.layer;
            var $ = layui.jquery;
            var upload = layui.upload;
            var jumpurl = '/article-lists';
            var inputTags = layui.inputTags;
            var tags = '{{ $info['tags'] }}';
            var tagsclass = inputTags.render({
                elem:'#inputTags',
                content: [],
                aldaBtn: false,
                done: function(value){
                    //console.log(value)
                    //console.log(tagsclass.config.content);
                }
            })
//            var layedit = layui.layedit;
//
//            layedit.set({
//                uploadImage: {
//                    url: '/file/upload'
//                    ,type: 'post' //默认post
//                    ,data:{'_token':token}
//                }
//            });
//            layedit.build('txt',{
//                height: 400
//            }); //建立编辑器
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
                var ele ={};
                ele.title = $('#title').val();
                ele.content = editor.txt.html();
                ele.category_id= $('#category').val();
                ele.tags = tagsclass.config.content;
                ele.pic_id =$('#pic_id').val();
                var obj = {
                    _token:token,
                    element:ele,
                }

                $.post(data.form.action,obj,function(data){
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
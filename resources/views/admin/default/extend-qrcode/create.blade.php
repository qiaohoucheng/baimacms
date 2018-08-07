@extends('admin.default.home')
@section('css')
    <style>
        .cp-app{
            z-index: 999 !important;
            background-color: #dcdcdc !important;
        }
        </style>
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6">
                <form class="layui-form" action="{{ url('/extend-qrcode') }}" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <h3>填写信息</h3>
                        </div>
                        <div class="layui-card-body">
                            <div class="layui-form-item">
                                <label class="layui-form-label">链接地址</label>
                                <div class="layui-input-block">
                                    <input type="text" name="title" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">备注</label>
                                <div class="layui-input-block">
                                    <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">缩略图</label>
                                <div class="layui-input-block">
                                    <input type="hidden" name="pic_id">
                                    <button type="button" class="layui-btn layui-btn-sm" id="thumb-logo">
                                        <i class="layui-icon">&#xe67c;</i>上传图片
                                    </button>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">大小</label>
                                <div class="layui-input-block">
                                    <input type="text" name="size" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input" value="300" disabled>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">颜色</label>
                                <div class="layui-input-block">
                                    <input type="text" name="color" value="rgb(0, 0, 0)" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input color">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">背景色</label>
                                <div class="layui-input-block">
                                    <input type="text" name="bgcolor" value="rgb(255, 255, 255)"  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input color">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">边距</label>
                                <div class="layui-input-block">
                                    <input type="text" name="margin" lay-verify="required" placeholder="请输入边距" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit=""  lay-filter="create-btn">立即提交</button>
                                    <button  type="button" laybaima-event="look" class="layui-btn layui-btn-primary">预览</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="layui-col-md4">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <h3>预览</h3>
                    </div>
                    <div class="layui-card-body">
                        <div class="layui-images" style="width: 100%; height: 486px;text-align: center;padding:auto 0;">
                            <div class="qr-box" style="padding-top:50px;">
                                {!! QrCode::size(300)->generate(Request::url()) !!}
                            </div>
                            <button type="download"  class="layui-btn layui-btn-primary">下载</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{  asset('/plugins/color-picker/colors.js') }}"></script>
    <script src="{{  asset('/plugins/color-picker/color-picker.data.js') }}"></script>
    <script src="{{  asset('/plugins/color-picker/color-picker.js') }}"></script>
    <script src="{{  asset('/plugins/color-picker/jq-color.js') }}"></script>
    <script src="{{  asset('/js/color.js') }}"></script>
    <script>
        layui.use(['form', 'layedit', 'laydate','upload'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,upload = layui.upload;

            //执行实例
            var uploadInst = upload.render({
                elem: '#thumb-logo' //绑定元素
                ,url: '/upload/' //上传接口
                ,done: function(res){
                    //上传完毕回调
                }
                ,error: function(){
                    //请求异常回调
                }
            });
            //监听提交
            form.on('submit(create-btn)', function(data){
                $.post(data.form.action,data.field,function(data){
                    layer.msg(data.message);
                    if(data.code==1){
                        //setTimeout(function(){
                        //    window.location.href='/power-menu';
                        //},1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
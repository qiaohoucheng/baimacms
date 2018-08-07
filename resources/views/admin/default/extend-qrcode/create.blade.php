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
                                    <input type="hidden" name="pic_id" id="pic_id">
                                    <button type="button" class="layui-btn layui-btn-sm" id="thumb-logo">
                                        <i class="layui-icon">&#xe67c;</i>上传图片
                                    </button>
                                    <span class="layui-word-aux">（只支持PNG格式图片）</span>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">大小</label>
                                <div class="layui-input-block">
                                    <input type="number" name="size" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input" value="300" disabled>
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
                                    <input type="number" name="margin" lay-verify="required" placeholder="请输入边距" autocomplete="off" class="layui-input" value="1">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit=""  lay-filter="create-btn">立即提交</button>
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
                        <h3>二维码</h3>
                    </div>
                    <div class="layui-card-body">
                        <div class="layui-images " style="width: 100%; text-align: center;height: 486px;padding:auto 0;">
                            <div class="qr-box" style="padding-top:50px;">
                                {!! QrCode::size(300)->color(255,0,255)->generate('http://qiaohoucheng.com') !!}
                            </div>
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
            var token = '{{ csrf_token() }}';
            //执行实例
            var uploadInst = upload.render({
                elem: '#thumb-logo',
                url: '/file/upload',
                accept:'images',
                exts:'png',
                data: {
                    _token:token
                },
                done: function(res){
                    layer.msg(res.message);
                    if(res.status ==1){
                        $('#pic_id').val(res.data.pic_id);
                    }
                },
                error: function(){
                    //请求异常回调
                }
            });
            //监听提交
            form.on('submit(create-btn)', function(data){
                $.post(data.form.action,data.field,function(data){
                    if(data.code==1){
                         $('.qr-box').html('<img src='+data.pic_url+'?'+Math.random()+'>');
                    }
                });
                return false;
            });
        });
    </script>
@endsection
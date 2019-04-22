@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">网站设置</div>
                    <div class="layui-card-body" pad15="">
                        <form class="layui-form" action="{{ url('/setting-web') }}" method="POST" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="layui-form" wid100="" lay-filter="">
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="sitename" value="{!! $data->sitename or '企业网站' !!}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站域名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="domain" lay-verify="url" value="{!! $data->domain or 'http://qiaohoucheng.com' !!}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">缓存时间</label>
                                <div class="layui-input-inline" style="width: 80px;">
                                    <input type="text" name="cache" lay-verify="number" value="{!! $data->cache or 0 !!}" class="layui-input">
                                </div>
                                <div class="layui-input-inline layui-input-company">分钟</div>
                                <div class="layui-form-mid layui-word-aux">本地开发一般推荐设置为 0，线上环境建议设置为 10。</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">最大文件上传</label>
                                <div class="layui-input-inline" style="width: 80px;">
                                    <input type="text" name="upload_max" lay-verify="number" value="{!! $data->upload_max or 2048 !!}" class="layui-input">
                                </div>
                                <div class="layui-input-inline layui-input-company">KB</div>
                                <div class="layui-form-mid layui-word-aux">提示：1 M = 1024 KB</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">上传文件类型</label>
                                <div class="layui-input-block">
                                    <input type="text" name="upload_type" value="{!! $data->upload_type or 'png|gif|jpg|jpeg|zip|rar' !!}" class="layui-input">
                                </div>
                            </div>

                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">首页标题</label>
                                <div class="layui-input-block">
                                    <textarea name="web_title" class="layui-textarea">{!! $data->web_title or 'Multipurpose One Page Responsive Template' !!}</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">META关键词</label>
                                <div class="layui-input-block">
                                    <textarea name="web_keywords" class="layui-textarea" placeholder="多个关键词用英文状态 , 号分割">{!! $data->web_keywords or '' !!}</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">META描述</label>
                                <div class="layui-input-block">
                                    <textarea name="web_descript" class="layui-textarea">{!! $data->web_descript or '介绍网站的一句话最好在160个字以内' !!}</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">版权信息</label>
                                <div class="layui-input-block">
                                    <textarea name="web_copyright" class="layui-textarea">{!! $data->web_copyright or '© 2018 qiahoucheng.com MIT license' !!}</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit="" lay-filter="set_website">确认保存</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        layui.use(['form','upload'], function(){
            var form = layui.form;
            var layer = layui.layer;
            //监听提交
            form.on('submit(set_website)', function(data){
                $.post(data.form.action,data.field,function(data){
                    layer.msg(data.message);
                    if(data.code==1){
                        setTimeout(function(){
                            window.location.reload();
                        },1000)
                    }
                });
                return false;
            });
        });
    </script>
@endsection
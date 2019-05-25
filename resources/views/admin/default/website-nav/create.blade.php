@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <form class="layui-form" action="{{ url('/website-nav') }}" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <h3>填写信息</h3>
                        </div>
                        <div class="layui-card-body">
                            <div class="layui-form-item">
                                <label class="layui-form-label">名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="title" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">路由</label>
                                <div class="layui-input-block">
                                    <input type="text" name="url" lay-verify="required" placeholder="请输入链接" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">父级导航</label>
                                <div class="layui-input-block">
                                    <select name="pid" lay-filter="aihao">
                                        <option value="0">根目录</option>
                                        @foreach($list as $k=>$v)
                                            <option value="{{$v['id']}}">{{$v['title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">排序</label>
                                <div class="layui-input-block">
                                    <input type="text" name="sort"  placeholder="请输入数字" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item" pane="">
                                <label class="layui-form-label">是否隐藏</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="is_hide" value="1" title="是">
                                    <input type="radio" name="is_hide" value="0" title="否" checked="">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit="" lay-filter="create-btn">立即提交</button>
                                    <a href="{{url('/website-nav')}}" class="layui-btn layui-btn-primary">返回</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit

            //自定义验证规则
            form.verify({
                title: function(value){
                    if(value.length < 5){
                        return '标题至少得5个字符啊';
                    }
                }
                ,pass: [/(.+){6,12}$/, '密码必须6到12位']
                ,content: function(value){
                    layedit.sync(editIndex);
                }
            });

            //监听提交
            form.on('submit(create-btn)', function(data){
                console.log(data);
                $.post(data.form.action,data.field,function(data){
                    layer.msg(data.message);
                    if(data.code==1){
                        setTimeout(function(){
                            window.location.href='/website-nav';
                        },1000);
                    }
                });
                return false;
            });
        });
    </script>

@endsection
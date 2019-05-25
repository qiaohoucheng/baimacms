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
                        <form class="layui-form layui-form-pane" action="{!!  '/power-users' !!}" method="POST" id="user_create">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="layui-form-item">
                                <label class="layui-form-label">真实姓名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="name" autocomplete="off"  lay-verify="required" placeholder="请输入姓名" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">登录邮箱</label>
                                <div class="layui-input-block">
                                    <input type="text" name="email" lay-verify="email" autocomplete="off" class="layui-input" placeholder="请输入邮箱" >
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">角色</label>
                                <div class="layui-input-block">
                                    <select name="role" lay-filter="role">
                                        <option value=""></option>
                                        <option value="0">写作</option>
                                        <option value="1" selected="">阅读</option>
                                        <option value="2">游戏</option>
                                        <option value="3">音乐</option>
                                        <option value="4">旅行</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">密码</label>
                                <div class="layui-input-block">
                                    <input type="password" name="password" id="password" autocomplete="off"  lay-verify="require|pass"  placeholder="请输入密码" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">确认密码</label>
                                <div class="layui-input-block">
                                    <input type="password" name="repassword" autocomplete="off"  lay-verify="required|repass" placeholder="请输入标题" class="layui-input">
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
        </div>
    </div>

    <script>
        layui.use(['form','upload','jquery'], function(){
            var form = layui.form;
            var layer = layui.layer;
            var $ = layui.jquery;
            var jumpurl = '/power-users';

            form.verify({
                pass: [
                    /^[\S]{6,12}$/
                    ,'密码必须6到12位，且不能出现空格'
                ],
                repass: function(value) {
                    //获取密码
                    var pass = $("#password").val();
                    if(!new RegExp(pass).test(value)) {
                        return '两次输入的密码不一致';
                    }
                }
            });
            //监听提交
            form.on('submit(save)', function(data){
                var thisform = $('#user_create');

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
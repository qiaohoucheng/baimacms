@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">修改密码</div>
                    <div class="layui-card-body" pad15="">
                        <form class="layui-form layui-form-pane" action="{!!  '/setting-user/password' !!}" method="POST" id="userpwd_create">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="layui-form" lay-filter="">
                            <div class="layui-form-item">
                                <label class="layui-form-label">当前密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="oldPassword" lay-verify="required" lay-vertype="tips" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">新密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="password" lay-verify="required|pass" lay-vertype="tips" autocomplete="off" id="password" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">确认新密码</label>
                                <div class="layui-input-inline">
                                    <input type="password" name="repassword" lay-verify="required|repass" lay-vertype="tips" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit="" lay-filter="setmypass">确认修改</button>
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

            //自定义验证规则
            form.verify({
                pass: [
                    /^[\S]{6,16}$/
                    ,'密码必须6到12位，且不能出现空格'
                ],
                repass: function(value) {
                    var pass = $("#password").val();
                    if(pass != value) {
                        return '两次输入的密码不一致';
                    }
                }
            });
            form.on('submit(setmypass)', function(data){
                $.post(data.form.action,data.field,function(data){
                    layer.msg(data.message);
                    if(data.code==200){
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
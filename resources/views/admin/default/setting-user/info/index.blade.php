@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">设置我的资料</div>
                    <div class="layui-card-body" pad15="">
                        <form class="layui-form layui-form-pane" action="{!!  '/setting-user/info' !!}" method="POST" id="userinfo_create">
                        <input type="hidden" name="id" value="{{ $user->id }}" id="info_id" >
                        <div class="layui-form" lay-filter="">
                            <div class="layui-form-item">
                                <label class="layui-form-label">我的角色</label>
                                <div class="layui-input-inline">
                                    <select name="role" lay-verify="">
                                        <option value="1" selected="">超级管理员</option>
                                        <option value="2" disabled="">普通管理员</option>
                                        <option value="3" disabled="">编辑人员</option>
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux">当前角色不可更改为其它角色</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">邮箱</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="email" value="{{ $user->email }}" lay-verify="email" readonly="" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">不可修改。一般用于后台登入名</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">昵称</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="name" value="{{ $user->name }}" lay-verify="nickname" autocomplete="off" placeholder="请输入昵称" class="layui-input" id="name">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">性别</label>
                                <div class="layui-input-block" id="genderRadio">
                                    <input type="radio" name="gender" value="1" title="男"
                                    @if($user->gender == 1) checked="" @endif>
                                    <input type="radio" name="gender" value="0" title="女"
                                    @if($user->gender != 1) checked="" @endif>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">手机</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="mobile" value="{{ $user->mobile or '' }}" lay-verify="phone" autocomplete="off" class="layui-input" id="mobile">
                                </div>
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label">备注</label>
                                <div class="layui-input-block">
                                    <textarea id="remarks" name="remarks" placeholder="请输入内容" class="layui-textarea">{{ $user->remarks or '' }}</textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit="" lay-filter="setmyinfo" >确认修改</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重新填写</button>
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
        layui.use(['form','layer'], function(){
            var form = layui.form;
            var layer = layui.layer;
            var token = '{{ csrf_token() }}';
            //监听提交


            form.on('submit(setmyinfo)', function(data){
                var ele ={};
                var id = $('#info_id').val();
                ele.name = $('#name').val();
                ele.gender = $('#genderRadio input[name="gender"]:checked ').val();
                ele.mobile = $('#mobile').val()? $('#mobile').val() : ''
                ele.remarks = $('#remarks').val() ? $('#remarks').val() : '';

                var obj = {
                    _token:token,
                    element:ele,
                    id:id,
                }
                $.post(data.form.action,obj,function(data){
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
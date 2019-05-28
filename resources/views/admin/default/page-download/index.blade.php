@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">
                    </div>
                    <div class="layui-card-body">
                        <form class="layui-form" action="{!!  '/page-download' !!}"  method="POST" id="page_create">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <table class="layui-table">
                            <colgroup>
                                <col width="10%">
                                <col width="10%">
                                <col width="30%">
                                <col width="25%">
                                <col width="5%">
                                <col width="20%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>页面</th>
                                <th>标签名称</th>
                                <th>内容</th>
                                <th>内容（第二语言）</th>
                                <th>类型</th>
                                <th>链接</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td   bgcolor="#F7F7F7" align="center">下载中心</td>
                                <td  align="center">文件名</td>
                                <td><input type="text" class="layui-input" name="C_00" id="C_00" value="{{ $arr['C_00'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_00" id="E_00" value="{{ $arr['E_00'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_00" id="U_00" value="{{ $arr['U_00'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td scope="row" colspan="6">
                                    <button class="layui-btn" lay-submit="" lay-filter="create-btn">确认</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                    <div class="layui-card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        layui.use(['form', 'layedit', 'upload'], function(){
            var form = layui.form;
            //监听提交
            form.on('submit(create-btn)', function(data){
                $.post(data.form.action,data.field,function(data){
                    layer.msg(data.message);
                    if(data.code==1){
                        setTimeout(function(){
                            window.location.href='/page-download';
                        },1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
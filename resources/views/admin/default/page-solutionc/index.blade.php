@extends('admin.default.home')
@section('css')
    <style>
        .layui-col-space15>* {
            padding-bottom: 100px;
        }
    </style>
@endsection
@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">
                    </div>
                    <div class="layui-card-body">
                        <form class="layui-form" action="{!!  '/page-solutionc' !!}"  method="POST" id="page_create">
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
                                    <td  rowspan="4" scope="col" bgcolor="#F7F7F7" align="center">能源图标</td>
                                    <td  align="center">图标一</td>
                                    <td>
                                        <button type="button" class="layui-btn upload-btn" name="C_00" id="C_00">
                                            <i class="layui-icon"></i>上传文件</button>
                                    </td>
                                    <td>
                                        <img src="{{ $arr['E_00'] or '' }}"  id="E_00_img" >
                                        <input type="hidden" name="E_00" id="E_00" value="{{ $arr['E_00'] or '' }}">
                                    </td>
                                    <td align="center">img</td>
                                    <td>
                                        <input type="text" class="layui-input" readonly="" name="U_00" id="U_00" value="{{ $arr['U_00'] or '' }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td  align="center">图标二</td>
                                    <td>
                                        <button type="button" class="layui-btn upload-btn" name="C_01" id="C_01">
                                            <i class="layui-icon"></i>上传文件</button>
                                    </td>
                                    <td>
                                        <img src="{{ $arr['E_01'] or '' }}"  id="E_01_img" >
                                        <input type="hidden" name="E_01" id="E_01" value="{{ $arr['E_01'] or '' }}">
                                    </td>
                                    <td align="center">img</td>
                                    <td>
                                        <input type="text" class="layui-input" readonly="" name="U_01" id="U_01" value="{{ $arr['U_01'] or '' }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td  align="center">图标三</td>
                                    <td>
                                        <button type="button" class="layui-btn upload-btn" name="C_02" id="C_02">
                                            <i class="layui-icon"></i>上传文件</button>
                                    </td>
                                    <td>
                                        <img src="{{ $arr['E_02'] or '' }}"  id="E_02_img" >
                                        <input type="hidden" name="E_02" id="E_02" value="{{ $arr['E_02'] or '' }}">
                                    </td>
                                    <td align="center">img</td>
                                    <td>
                                        <input type="text" class="layui-input" readonly="" name="U_02" id="U_02" value="{{ $arr['U_02'] or '' }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td  align="center">图标四</td>
                                    <td>
                                        <button type="button" class="layui-btn upload-btn" name="C_03" id="C_03">
                                            <i class="layui-icon"></i>上传文件</button>
                                    </td>
                                    <td>
                                        <img src="{{ $arr['E_03'] or '' }}"  id="E_03_img" >
                                        <input type="hidden" name="E_03" id="E_03" value="{{ $arr['E_03'] or '' }}">
                                    </td>
                                    <td align="center">img</td>
                                    <td>
                                        <input type="text" class="layui-input" readonly="" name="U_03" id="U_03" value="{{ $arr['U_03'] or '' }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td  bgcolor="#F7F7F7" align="center">能源简介</td>
                                    <td  align="center">简介信息</td>
                                    <td>
                                        <input type="text" class="layui-input" name="C_10" id="C_10" value="{{ $arr['C_10'] or '' }}" />
                                    </td>
                                    <td>
                                        <input type="text" class="layui-input" name="E_10" id="E_10" value="{{ $arr['E_10'] or '' }}" />
                                    </td>
                                    <td align="center">text</td>
                                    <td>
                                        <input type="text" class="layui-input" readonly="" name="U_10" id="U_10" value="{{ $arr['U_10'] or '' }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td  rowspan="3" scope="col" bgcolor="#F7F7F7" align="center">功能拓扑图</td>
                                    <td  align="center">标题</td>
                                    <td><input type="text" class="layui-input" name="C_20" id="C_20" value="{{ $arr['C_20'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_20" id="E_20" value="{{ $arr['E_20'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_20" id="U_20" value="{{ $arr['U_20'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">背景图片</td>
                                    <td>
                                        <button type="button" class="layui-btn upload-btn" name="C_21" id="C_21"  value="{{ $arr['C_21'] or '' }}">
                                            <i class="layui-icon"></i>上传文件</button>
                                    </td>
                                    <td><img src="{{ $arr['E_21'] or '' }}" id="E_21_img"><input type="hidden" name="E_21" id="E_21"  value="{{ $arr['E_21'] or '' }}"></td>
                                    <td align="center">img</td>
                                    <td><input type="text" class="layui-input"  name="U_21" id="U_21" value="{{ $arr['U_21'] or '' }}"  /></td>
                                </tr>
                                <tr>
                                    <td  align="center">图片标题</td>
                                    <td><input type="text" class="layui-input" name="C_22" id="C_22" value="{{ $arr['C_22'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_22" id="E_22" value="{{ $arr['E_22'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_22" id="U_22" value="{{ $arr['U_22'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  rowspan="3" scope="col" bgcolor="#F7F7F7" align="center">网络结构图</td>
                                    <td  align="center">标题</td>
                                    <td><input type="text" class="layui-input" name="C_30" id="C_30" value="{{ $arr['C_30'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_30" id="E_30" value="{{ $arr['E_30'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_30" id="U_30" value="{{ $arr['U_30'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">图片</td>
                                    <td>
                                        <button type="button" class="layui-btn upload-btn" name="C_31" id="C_31"  value="{{ $arr['C_31'] or '' }}">
                                            <i class="layui-icon"></i>上传文件</button>
                                    </td>
                                    <td><img src="{{ $arr['E_31'] or '' }}" id="E_31_img"><input type="hidden" name="E_31" id="E_31"  value="{{ $arr['E_31'] or '' }}"></td>
                                    <td align="center">img</td>
                                    <td><input type="text" class="layui-input"  name="U_31" id="U_31" value="{{ $arr['U_31'] or '' }}"  /></td>
                                </tr>
                                <tr>
                                    <td  align="center">图片标题</td>
                                    <td><input type="text" class="layui-input" name="C_32" id="C_32" value="{{ $arr['C_32'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_32" id="E_32" value="{{ $arr['E_32'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_32" id="U_32" value="{{ $arr['U_32'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  rowspan="10" scope="col" bgcolor="#F7F7F7" align="center">方案说明</td>
                                    <td  align="center">标题</td>
                                    <td><input type="text" class="layui-input" name="C_40" id="C_40" value="{{ $arr['C_40'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_40" id="E_40" value="{{ $arr['E_40'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_40" id="U_40"  value="{{ $arr['U_40'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">图片</td>
                                    <td>
                                        <button type="button" class="layui-btn upload-btn" name="C_41" id="C_41"  value="{{ $arr['C_41'] or '' }}">
                                            <i class="layui-icon"></i>上传文件</button>
                                    </td>
                                    <td><img src="{{ $arr['E_41'] or '' }}" id="E_41_img"><input type="hidden" name="E_41" id="E_41"  value="{{ $arr['E_41'] or '' }}"></td>
                                    <td align="center">img</td>
                                    <td><input type="text" class="layui-input"  name="U_41" id="U_41" value="{{ $arr['U_41'] or '' }}"  /></td>
                                </tr>
                                <tr>
                                    <td  align="center">说明一</td>
                                    <td><input type="text" class="layui-input" name="C_42" id="C_42" value="{{ $arr['C_42'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_42" id="E_42" value="{{ $arr['E_42'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_42" id="U_42" value="{{ $arr['U_42'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">说明二</td>
                                    <td><input type="text" class="layui-input" name="C_43" id="C_43" value="{{ $arr['C_43'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_43" id="E_43" value="{{ $arr['E_43'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_43" id="U_43" value="{{ $arr['U_43'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">说明三</td>
                                    <td><input type="text" class="layui-input" name="C_44" id="C_44" value="{{ $arr['C_44'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_44" id="E_44" value="{{ $arr['E_44'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_44" id="U_44" value="{{ $arr['U_44'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">说明四</td>
                                    <td><input type="text" class="layui-input" name="C_45" id="C_45" value="{{ $arr['C_45'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_45" id="E_45" value="{{ $arr['E_45'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_45" id="U_45" value="{{ $arr['U_45'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">说明五</td>
                                    <td><input type="text" class="layui-input" name="C_46" id="C_46" value="{{ $arr['C_46'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_46" id="E_46" value="{{ $arr['E_46'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_46" id="U_46" value="{{ $arr['U_46'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">说明六</td>
                                    <td><input type="text" class="layui-input" name="C_47" id="C_47" value="{{ $arr['C_48'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_47" id="E_47" value="{{ $arr['E_48'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_47" id="U_47" value="{{ $arr['U_48'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">说明七</td>
                                    <td><input type="text" class="layui-input" name="C_48" id="C_48" value="{{ $arr['C_48'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_48" id="E_48" value="{{ $arr['E_48'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_48" id="U_48" value="{{ $arr['U_48'] or '' }}" /></td>
                                </tr>
                                <tr>
                                    <td  align="center">说明八</td>
                                    <td><input type="text" class="layui-input" name="C_49" id="C_49" value="{{ $arr['C_49'] or '' }}" /></td>
                                    <td><input type="text" class="layui-input" name="E_49" id="E_49" value="{{ $arr['E_49'] or '' }}" /></td>
                                    <td align="center">text</td>
                                    <td><input type="text" class="layui-input" name="U_49" id="U_49" value="{{ $arr['U_49'] or '' }}" /></td>
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
            var upload = layui.upload;
            var token = '{{ csrf_token() }}';
            var uploadInst = upload.render({
                elem: '.upload-btn'
                ,url: '/file/upload'
                ,size: 4000 //限制文件大小，单位 KB
                ,data:{'_token':token}
                ,before: function(obj){
                    var itemid = this.item.context.id;
                    itemid = itemid.replace('C','E');
                    console.log(itemid);
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#'+itemid+'_img').attr('src',result)
                    });
                }
                ,done: function(res){
                    var itemid = this.item.context.id;
                    itemid = itemid.replace('C','E');
                    //如果上传失败
                    if(res.code > 0){
                        $('#'+itemid).val(res.data.url)
                        return layer.msg('上传成功');
                    }
                    //上传成功
                }
                ,error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });
            //监听提交
            form.on('submit(create-btn)', function(data){
                console.log(data);
                $.post(data.form.action,data.field,function(data){
                    layer.msg(data.message);
                    if(data.code==1){
                        setTimeout(function(){
                            window.location.href='/page-solutionb';
                        },1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
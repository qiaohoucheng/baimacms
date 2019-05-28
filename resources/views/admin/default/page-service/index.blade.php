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
                        <form class="layui-form" action="{!!  '/page-index' !!}"  method="POST" id="page_create">
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
                                <td   bgcolor="#F7F7F7" align="center">服务保障体系</td>
                                <td  align="center">标题名称</td>
                                <td><input type="text" class="layui-input" name="C_00" id="C_00" value="{{ $arr['C_00'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_00" id="E_00" value="{{ $arr['E_00'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_00" readonly id="U_00" value="{{ $arr['U_00'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  rowspan="2" scope="col" bgcolor="#F7F7F7" align="center">第一栏</td>
                                <td  align="center">标题（左）</td>
                                <td><input type="text" class="layui-input" name="C_10" id="C_10" value="{{ $arr['C_10'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_10" id="E_10" value="{{ $arr['E_10'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_10" id="U_10" value="{{ $arr['U_10'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  align="center">图片（右）</td>
                                <td>
                                    <button type="button" class="layui-btn upload-btn" name="C_11" id="C_11"  value="{{ $arr['C_11'] or '' }}">
                                    <i class="layui-icon"></i>上传文件</button>
                                </td>
                                <td><img src="{{ $arr['E_11'] or '' }}" id="E_11_img"><input type="hidden" name="E_11" id="E_11"  value="{{ $arr['E_11'] or '' }}"></td>
                                <td align="center">img</td>
                                <td><input type="text" class="layui-input"  name="U_11" id="U_11" value="{{ $arr['U_11'] or '' }}"  /></td>
                            </tr>
                            <tr>
                                <td  rowspan="2" scope="col" bgcolor="#F7F7F7" align="center">第二栏</td>
                                <td  align="center">标题（左）</td>
                                <td><input type="text" class="layui-input" name="C_12" id="C_12" value="{{ $arr['C_12'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_12" id="E_12" value="{{ $arr['E_12'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_12" id="U_12"  value="{{ $arr['U_12'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  align="center">图片（右）</td>
                                <td>
                                    <button type="button" class="layui-btn upload-btn" name="C_13" id="C_13" >
                                        <i class="layui-icon"></i>上传文件</button>
                                </td>
                                <td><img src="{{ $arr['E_13'] or '' }}" id="E_13_img"><input type="hidden" name="E_13" id="E_13" value="{{ $arr['E_13'] or '' }}"></td>
                                <td align="center">img</td>
                                <td><input type="text" class="layui-input" name="U_13" id="U_13"  value="{{ $arr['U_13'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  rowspan="2" scope="col" bgcolor="#F7F7F7" align="center">第三栏</td>
                                <td  align="center">标题（左）</td>
                                <td><input type="text" class="layui-input" name="C_12" id="C_12" value="{{ $arr['C_12'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_12" id="E_12" value="{{ $arr['E_12'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_12" id="U_12"  value="{{ $arr['U_12'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  align="center">图片（右）</td>
                                <td>
                                    <button type="button" class="layui-btn upload-btn" name="C_13" id="C_13" >
                                        <i class="layui-icon"></i>上传文件</button>
                                </td>
                                <td><img src="{{ $arr['E_13'] or '' }}" id="E_13_img"><input type="hidden" name="E_13" id="E_13" value="{{ $arr['E_13'] or '' }}"></td>
                                <td align="center">img</td>
                                <td><input type="text" class="layui-input" name="U_13" id="U_13"  value="{{ $arr['U_13'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  rowspan="2" scope="col" bgcolor="#F7F7F7" align="center">服务热线</td>
                                <td  align="center">标题</td>
                                <td><input type="text" class="layui-input" name="C_12" id="C_12" value="{{ $arr['C_12'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_12" id="E_12" value="{{ $arr['E_12'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_12" id="U_12"  value="{{ $arr['U_12'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  align="center">图片（右）</td>
                                <td>
                                    <button type="button" class="layui-btn upload-btn" name="C_13" id="C_13" >
                                        <i class="layui-icon"></i>上传文件</button>
                                </td>
                                <td><img src="{{ $arr['E_13'] or '' }}" id="E_13_img"><input type="hidden" name="E_13" id="E_13" value="{{ $arr['E_13'] or '' }}"></td>
                                <td align="center">img</td>
                                <td><input type="text" class="layui-input" name="U_13" id="U_13"  value="{{ $arr['U_13'] or '' }}" /></td>
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
                            window.location.href='/page-index';
                        },1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
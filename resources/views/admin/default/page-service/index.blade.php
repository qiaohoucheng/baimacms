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
                        <form class="layui-form" action="{!!  '/page-service' !!}"  method="POST" id="page_create">
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
                                <td  align="center">标题（右）</td>
                                <td><input type="text" class="layui-input" name="C_20" id="C_20" value="{{ $arr['C_20'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_20" id="E_20" value="{{ $arr['E_20'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_20" id="U_20"  value="{{ $arr['U_202'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  align="center">图片（左）</td>
                                <td>
                                    <button type="button" class="layui-btn upload-btn" name="C_21" id="C_21" >
                                        <i class="layui-icon"></i>上传文件</button>
                                </td>
                                <td><img src="{{ $arr['E_21'] or '' }}" id="E_21_img"><input type="hidden" name="E_21" id="E_21" value="{{ $arr['E_13'] or '' }}"></td>
                                <td align="center">img</td>
                                <td><input type="text" class="layui-input" name="U_21" id="U_21"  value="{{ $arr['U_21'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  rowspan="2" scope="col" bgcolor="#F7F7F7" align="center">第三栏</td>
                                <td  align="center">标题（左）</td>
                                <td><input type="text" class="layui-input" name="C_30" id="C_30" value="{{ $arr['C_30'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_30" id="E_30" value="{{ $arr['E_30'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_30" id="U_30"  value="{{ $arr['U_30'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  align="center">图片（右）</td>
                                <td>
                                    <button type="button" class="layui-btn upload-btn" name="C_31" id="C_31" >
                                        <i class="layui-icon"></i>上传文件</button>
                                </td>
                                <td>
                                    <img src="{{ $arr['E_31'] or '' }}" id="E_31_img">
                                    <input type="hidden" name="E_31" id="E_31" value="{{ $arr['E_31'] or '' }}">
                                </td>
                                <td align="center">img</td>
                                <td><input type="text" class="layui-input" name="U_31" id="U_31"  value="{{ $arr['U_31'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  rowspan="2" scope="col" bgcolor="#F7F7F7" align="center">服务热线</td>
                                <td  align="center">标题</td>
                                <td><input type="text" class="layui-input" name="C_40" id="C_40" value="{{ $arr['C_40'] or '' }}" /></td>
                                <td><input type="text" class="layui-input" name="E_40" id="E_40" value="{{ $arr['E_40'] or '' }}" /></td>
                                <td align="center">text</td>
                                <td><input type="text" class="layui-input" name="U_40" id="U_40"  value="{{ $arr['U_40'] or '' }}" /></td>
                            </tr>
                            <tr>
                                <td  align="center">图片</td>
                                <td>
                                    <button type="button" class="layui-btn upload-btn" name="C_41" id="C_41" >
                                        <i class="layui-icon"></i>上传文件</button>
                                </td>
                                <td>
                                    <img src="{{ $arr['E_41'] or '' }}" id="E_41_img">
                                    <input type="hidden" name="E_41" id="E_41" value="{{ $arr['E_41'] or '' }}"></td>
                                <td align="center">img</td>
                                <td><input type="text" class="layui-input" name="U_41" id="U_41"  value="{{ $arr['U_41'] or '' }}" /></td>
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
                            window.location.href='/page-service';
                        },1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
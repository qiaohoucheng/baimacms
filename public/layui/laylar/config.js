layui.define(['laytpl', 'layer', 'element', 'util'], function(exports){
    exports('setlar', {
        container: 'LAY_app' //容器ID
        ,pageTabs: false //是否开启页面选项卡功能。单页版不推荐开启
        ,name: 'BaimaCMS' //项目名
        ,tableName: 'layuiAdmin' //本地存储表名
        ,MOD_NAME: 'admin' //模块事件名
        ,debug: true //是否开启调试模式。如开启，接口异常时会抛出异常 URL 等信息
        //扩展的第三方模块
        ,extend: [
            'echarts', //echarts 核心包
            'echartsTheme' //echarts 主题
        ]
        //主题配置
        ,theme: {
            //内置主题配色方案
            color: [{
                main: '#20222A' //主题色
                ,selected: '#009688' //选中色
                ,alias: 'default' //默认别名
            },{
                main: '#03152A'
                ,selected: '#3B91FF'
                ,alias: 'dark-blue' //藏蓝
            },{
                main: '#2E241B'
                ,selected: '#A48566'
                ,alias: 'coffee' //咖啡
            },{
                main: '#50314F'
                ,selected: '#7A4D7B'
                ,alias: 'purple-red' //紫红
            },{
                main: '#344058'
                ,logo: '#1E9FFF'
                ,selected: '#1E9FFF'
                ,alias: 'ocean' //海洋
            },{
                main: '#3A3D49'
                ,logo: '#2F9688'
                ,selected: '#5FB878'
                ,alias: 'green' //墨绿
            },{
                main: '#20222A'
                ,logo: '#F78400'
                ,selected: '#F78400'
                ,alias: 'red' //橙色
            },{
                main: '#28333E'
                ,logo: '#AA3130'
                ,selected: '#AA3130'
                ,alias: 'fashion-red' //时尚红
            },{
                main: '#24262F'
                ,logo: '#3A3D49'
                ,selected: '#009688'
                ,alias: 'classic-black' //经典黑
            },{
                logo: '#226A62'
                ,header: '#2F9688'
                ,alias: 'green-header' //墨绿头
            },{
                main: '#344058'
                ,logo: '#0085E8'
                ,selected: '#1E9FFF'
                ,header: '#1E9FFF'
                ,alias: 'ocean-header' //海洋头
            },{
                header: '#393D49'
                ,alias: 'classic-black-header' //经典黑头
            }]
            ,initColorIndex: 0
        }
    });
});
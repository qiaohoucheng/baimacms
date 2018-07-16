<!-- 头部区域 -->
<ul class="layui-nav layui-layout-left">
    <li class="layui-nav-item layadmin-flexible" lay-unselect="">
        <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
            <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
        </a>
    </li>
    <li class="layui-nav-item layui-this layui-hide-xs layui-hide-sm layui-show-md-inline-block">
      <a lay-href="" title="">
        控制台
      </a>
    </li>
    <li class="layui-nav-item layui-hide-xs" lay-unselect="">
        <a href="http://www.layui.com/admin/" target="_blank" title="前台">
            <i class="layui-icon layui-icon-website"></i>
        </a>
    </li>
    <li class="layui-nav-item" lay-unselect="">
        <a href="javascript:;" layadmin-event="refresh" title="刷新">
            <i class="layui-icon layui-icon-refresh-3"></i>
        </a>
    </li>
    <li class="layui-nav-item layui-hide-xs" lay-unselect="">
        <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search" layadmin-event="serach" lay-action="template/search/keywords=">
    </li>
    <span class="layui-nav-bar"></span>
</ul>
<ul class="layui-nav layui-layout-right" >
    <li class="layui-nav-item" >
        <a lay-href="app/message/" layadmin-event="message">
            <i class="layui-icon layui-icon-notice"></i>

            <!-- 如果有新消息，则显示小圆点 -->
            <script type="text/html" template="" lay-url="./json/message/new.js">
                @{{# if(d.data.newmsg){ }}
                <span class="layui-badge-dot"></span>
                @{{# } }}
            </script>

        </a>
    </li>
    <li class="layui-nav-item layui-hide-xs">
        <a href="javascript:;" layadmin-event="theme">
            <i class="layui-icon layui-icon-theme"></i>
        </a>
    </li>
    <li class="layui-nav-item layui-hide-xs">
        <a href="javascript:;" layadmin-event="note">
            <i class="layui-icon layui-icon-note"></i>
        </a>
    </li>
    <li class="layui-nav-item layui-hide-xs">
        <a href="javascript:;" layadmin-event="fullscreen">
            <i class="layui-icon layui-icon-screen-full"></i>
        </a>
    </li>
    <li class="layui-nav-item" lay-unselect="">
        <script type="text/html" template="" lay-url="./json/user/session.js" lay-done="layui.element.render('nav', 'layadmin-layout-right');">
            <a href="javascript:;">
                <cite>@{{ d.data.username }}</cite>
            </a>
            <dl class="layui-nav-child">
                <dd><a lay-href="set/user/info">基本资料</a></dd>
                <dd><a lay-href="set/user/password">修改密码</a></dd>
                <hr>
                <dd layadmin-event="logout" style="text-align: center;"><a>退出</a></dd>
            </dl>
        </script>
        <a href="javascript:;">
            <cite>贤心</cite>
            <span class="layui-nav-more"></span>
        </a>
        <dl class="layui-nav-child layui-anim layui-anim-upbit">
            <dd><a lay-href="set/user/info">基本资料</a></dd>
            <dd><a lay-href="set/user/password">修改密码</a></dd>
            <hr>
            <dd layadmin-event="logout" style="text-align: center;"><a>退出</a></dd>
        </dl>
    </li>
    <li class="layui-nav-item layui-hide-xs" lay-unselect="">
        <a href="javascript:;" layadmin-event="about">
            <i class="layui-icon layui-icon-more-vertical"></i>
        </a>
    </li>
    <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-unselect="">
        <a href="javascript:;" layadmin-event="more">
            <i class="layui-icon layui-icon-more-vertical"></i>
        </a>
    </li>
    <span class="layui-nav-bar"></span>
</ul>

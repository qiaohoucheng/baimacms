<!-- 头部区域（可配合layui已有的水平导航） -->
<ul class="layui-nav layui-layout-left">
    <li class="layui-nav-item" >
        <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
            <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
        </a>
    </li>
    <li class="layui-nav-item layui-hide-xs"  >
        <a href="http://www.layui.com/admin/" target="_blank" title="前台">
            <i class="layui-icon layui-icon-website"></i>
        </a>
    </li>
    <li class="layui-nav-item" >
        <a href="javascript:;" layadmin-event="refresh" title="刷新">
            <i class="layui-icon layui-icon-refresh-3"></i>
        </a>
    </li>
    <li class="layui-nav-item  layui-hide-xs" lay-unselect>
        <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search" layadmin-event="serach">
    </li>
</ul>
<ul class="layui-nav layui-layout-right">
    <li class="layui-nav-item" lay-unselect>
        <a lay-href="app/message/" layadmin-event="message" >
            <i class="layui-icon layui-icon-notice"></i>
            <!-- 如果有新消息，则显示小圆点 -->
            <script type="text/html" template="" lay-url="./json/message/new.js">
                @{{# if(d.data.newmsg){ }}
                <span class="layui-badge-dot"></span>
                @{{# } }}
            </script>
        </a>
    </li>
    <li class="layui-nav-item" >
        <a href="javascript:;" layadmin-event="fullscreen">
            <i class="layui-icon layui-icon-screen-full"></i>
        </a>
    </li>
    <li class="layui-nav-item">
        <a href="javascript:;">
            {{ Auth::user()->name }}
            <span class="layui-nav-more"></span>
        </a>
        <dl class="layui-nav-child layui-anim layui-anim-upbit">
            <dd><a href="{{ url('/setting-user/info') }}">基本资料</a></dd>
            <dd><a href="{{ url('/setting-user/password') }}">修改密码</a></dd>
            <hr>
            <dd layadmin-event="logout" style="text-align: center;">
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">退出</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </dd>
        </dl>
    </li>
    <li class="layui-nav-item" lay-unselect>
        <a href="javascript:;" lay-even="about">
            {{--<i class="layui-icon layui-icon-more-vertical"></i>--}}
        </a>
    </li>
</ul>
{!! Request::is('application/*') ? 'layui-nav-itemed' : '' !!}
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="">
            <span>layuiAdmin Pro</span>
        </div>
        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="" data-jump="" class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;" lay-tips="主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i> <cite>主页</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="" data-jump="/" class="layui-this">
                        <a href="javascript:;" lay-href="/">控制台</a>
                    </dd>
                    <dd data-name="homepage1" data-jump="home/homepage1" class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd data-name="homepage2" data-jump="home/homepage2" class="">
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
        </ul>
    </div>
</div>
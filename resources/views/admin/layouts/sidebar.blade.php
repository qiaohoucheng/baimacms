{!! Request::is('application/*') ? 'layui-nav-itemed' : '' !!}
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="">
            <span>CMS</span>
        </div>
        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" >
            <li class="layui-nav-item layui-this">
                <a href="javascript:;" >
                    <i class="layui-icon layui-icon-chart-screen"></i> <cite>概览</cite>
                </a>
            </li>
            <li class="layui-nav-item ">
                <a href="javascript:;" lay-tips="首页管理" lay-direction="2">
                    <i class="layui-icon layui-icon-template-1"></i> <cite>首页管理</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" lay-href="/">轮播图管理</a>
                    </dd>
                    <dd  class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd >
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item ">
                <a href="javascript:;" lay-tips="内容管理" lay-direction="2">
                    <i class="layui-icon layui-icon-list"></i> <cite>内容管理</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" lay-href="/">控制台</a>
                    </dd>
                    <dd  class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd >
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item ">
                <a href="javascript:;" lay-tips="分类管理" lay-direction="2">
                    <i class="layui-icon layui-icon-fonts-code"></i> <cite>分类管理</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" lay-href="/">控制台</a>
                    </dd>
                    <dd  class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd >
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item ">
                <a href="javascript:;" lay-tips="用户管理" lay-direction="2">
                    <i class="layui-icon layui-icon-user"></i> <cite>用户管理</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" lay-href="/">控制台</a>
                    </dd>
                    <dd  class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd >
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item ">
                <a href="javascript:;" lay-tips="资源管理" lay-direction="2">
                    <i class="layui-icon layui-icon-picture"></i> <cite>资源管理</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" lay-href="/">控制台</a>
                    </dd>
                    <dd  class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd >
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item ">
                <a href="javascript:;" lay-tips="文档管理" lay-direction="2">
                    <i class="layui-icon layui-icon-file-b"></i> <cite>文档管理</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" lay-href="/">控制台</a>
                    </dd>
                    <dd  class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd >
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item ">
                <a href="javascript:;" lay-tips="权限管理" lay-direction="2">
                    <i class="layui-icon layui-icon-senior"></i> <cite>权限管理</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" lay-href="/">控制台</a>
                    </dd>
                    <dd  class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd >
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item ">
                <a href="javascript:;" lay-tips="设置" lay-direction="2">
                    <i class="layui-icon layui-icon-set"></i> <cite>设置</cite>
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd>
                        <a href="javascript:;" lay-href="/">控制台</a>
                    </dd>
                    <dd  class="">
                        <a href="javascript:;" lay-href="home/homepage1">主页一</a>
                    </dd>
                    <dd >
                        <a href="javascript:;" lay-href="home/homepage2">主页二</a>
                    </dd>
                </dl>
            </li>
        </ul>
    </div>
</div>
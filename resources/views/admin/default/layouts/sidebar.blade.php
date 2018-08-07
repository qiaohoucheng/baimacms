@inject('NAV', 'App\LeftNav')
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="">
            <span>CMS</span>
        </div>
        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" >
            <li class="layui-nav-item {!! Request::is('home') ? ' layui-this' : '' !!}" data-model="{{ $a }}">
                <a href="{{ url('/') }}" >
                    <i class="layui-icon layui-icon-chart-screen"></i> <cite>概览</cite>
                </a>
            </li>
            @foreach($NAV->getMenu() as $k=>$v)
                <li class="layui-nav-item {!! Request::is(ltrim($v['url'],'/').'*') ? ' layui-nav-itemed' : '' !!}">
                    <a href="javascript:;" lay-tips="{{ $v['title'] }}" lay-direction="{{ $v['id'] }}">
                        <i class="layui-icon {{ $v['icon'] }}"></i> <cite>{{ $v['title'] }}</cite>
                        <span class="layui-nav-more"></span>
                    </a>
                    @if(isset($v['child']))
                    <dl class="layui-nav-child ">
                        @foreach($v['child'] as $ck=>$cv)
                        <dd  {!! Request::is( ltrim($cv['url'],'/')) ? ' class="layui-this"' : '' !!}>
                            <a href="{{ url($cv['url']) }}">{{ $cv['title'] }}</a>
                        </dd>
                        @endforeach
                    </dl>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
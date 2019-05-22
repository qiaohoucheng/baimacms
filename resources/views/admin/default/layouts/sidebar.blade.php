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
                            @if(isset($cv['child']))
                            <li class="layui-nav-item {!! Request::is(ltrim($cv['url'],'/').'*') ? ' layui-nav-itemed' : '' !!}">
                                <a href="javascript:;" lay-tips="{{ $cv['title'] }}" lay-direction="{{ $cv['id'] }}">
                                    <cite>{{ $cv['title'] }}</cite>
                                    <span class="layui-nav-more"></span>
                                </a>
                                @foreach($cv['child'] as $dk=>$dv)
                                    <dl class="layui-nav-child ">
                                        <dd  {!! Request::is( ltrim($dv['url'],'/').'*') ? ' class="layui-this"' : '' !!}>
                                            <a href="{{ url($dv['url']) }}">{{ $dv['title'] }}</a>
                                        </dd>
                                    </dl>
                                @endforeach
                            </li>
                            @else
                                <dd  {!! Request::is( ltrim($cv['url'],'/').'*') ? ' class="layui-this"' : '' !!}>
                                <a href="{{ url($cv['url']) }}">{{ $cv['title'] }}</a>
                                </dd>
                            @endif

                        @endforeach
                    </dl>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
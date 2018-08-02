<?php

namespace App\Http\Middleware;

use Closure;

class Breadcrumbs
{
    /**
     * 面包屑导航
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->ajax()){
            $uri =  $request->route()->getName();
            if(strpos($uri,'.')){
                list($a,$c) = explode('.',$uri);
                if(strpos($a,'-')){
                    list($a,$b) = explode('-',$a);
                }
            }else{
                $a = $uri;
            }
            //后期会从缓存中取出
            $marr = array(
                'home'=>'概览',
                'website'=>'网站管理',
                'website-carousel'=>'轮播管理',
                'article'=>'内容管理',
                'type'=>'分类管理',
                'member'=>'用户管理',
                'resource'=>'资源管理',
                'doc'=>'文档管理',
                'power'=>'权限管理',
                'extend'=>'扩展管理',
                'setting'=>'设置',
            );
            $carr = array(
                'index'=>'首页管理',
                'carousel'=>'轮播图管理',
                'spread'=>'推广管理',
                'main'=>'精品推荐',
                'link'=>'友情链接',
                'menu'=>'菜单管理'
            );
            $farr = array(
                'index'=>'列表',
                'create'=>'新增',
                'edit'=>'编辑',
                'show'=>'详情',
            );
            if(isset($a)){
                $aname = array_key_exists($a,$marr) ? $marr[$a] : '';
                view()->share('a', $aname);
            }
            if(isset($b)){
                $bname = array_key_exists($b,$carr) ? $carr[$b] : '';
                view()->share('b', $bname);
            }
            if(isset($c)){
                $cname = array_key_exists($c,$farr) ? $farr[$c] : '';
                view()->share('c', $cname);
            }
            view()->share('jump',$a);
        }
        return $next($request);
    }
}

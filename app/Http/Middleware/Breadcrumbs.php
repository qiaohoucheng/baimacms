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
        $uri =  $request->route()->getName();
        if(strpos($uri,'.')){
            list($a,$b) = explode('.',$uri);
        }else{
            $a = $uri;
        }
        //后期会从缓存中取出
        $array = array(
            'home'=>'概览',
            'website'=>'网站管理',
        );
        $farr = array(
            'index'=>'列表',
            'create'=>'新增',
            'edit'=>'编辑',
            'show'=>'详情',
        );

        if(isset($a)){
            $aname = $array[$a] ? $array[$a] : '';
            view()->share('a', $aname);
        }
        if(isset($b)){
            $bname = $farr[$b] ? $farr[$b] : '';
            view()->share('b', $bname);
        }

        return $next($request);
    }
}

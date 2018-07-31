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
                list($a,$b) = explode('.',$uri);
            }else{
                $a = $uri;
            }
            //后期会从缓存中取出
            $marr = array(
                'home'=>'概览',
                'website'=>'网站管理',
                'article'=>'内容管理',
                'type'=>'分类管理',
                'member'=>'用户管理',
                'resource'=>'资源管理',
                'doc'=>'文档管理',
                'power'=>'权限管理',
                'extend'=>'扩展管理',
                'setting'=>'设置',
            );
            $farr = array(
                'index'=>'列表',
                'create'=>'新增',
                'edit'=>'编辑',
                'show'=>'详情',
            );

            if(isset($a)){
                $aname = $marr[$a] ? $marr[$a] : '';
                view()->share('a', $aname);
            }
            if(isset($b)){
                $bname = $farr[$b] ? $farr[$b] : '';
                view()->share('b', $bname);
            }
            view()->share('jump',$a);
        }
        return $next($request);
    }
}

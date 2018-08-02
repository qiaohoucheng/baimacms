<?php

namespace App\Http\Middleware;

use Closure;
use App\LeftNav;

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
            $aname = '';
            $bname = '';
            $uri =  $request->route()->getName();
            if(strpos($uri,'.')){
                list($a,$c) = explode('.',$uri);
                if(strpos($a,'-')){
                    list($a,$b) = explode('-',$a);
                }
            }else{
                $a = $uri;
            }
            $LeftNav = new LeftNav();
            $nav = $LeftNav->getMenu();
            $nav = $LeftNav->toArr($nav);
            foreach ($nav as $k=>$v){
                if(isset($a) && $a=='home'){
                    $aname = '概览';
                }
                if(isset($a) && $a == ltrim($v['url'],'/')){
                    $aname = $v['title'];
                }
                if(isset($b) &&  $a.'-'.$b == ltrim($v['url'],'/')){
                    $bname = $v['title'];
                }
            }

            $farr = array(
                'index'=>'列表',
                'create'=>'新增',
                'edit'=>'编辑',
                'show'=>'详情',
            );
            if(isset($a)){
                view()->share('a', $aname);
                view()->share('jumpa', $a);
            }
            if(isset($b)){
                view()->share('b', $bname);
                view()->share('jumpb', $a.'-'.$b);
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

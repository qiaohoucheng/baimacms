<?php

namespace App;
use App\Model\Menu;
use Auth;
use Illuminate\Support\Facades\Cache;

//这不是model类
class LeftNav
{
    public function getMenu()
    {
        //if(Cache::has('leftnav')){
        //    $data = Cache::get('leftnav');
        //    $data = json_decode($data,true);
        //else{
            $data =  Menu::where('status',1)->where('is_hide',0)->orderBy('sort','asc')->get()->toArray();
            $data =  $this->toTree($data);
       // }
        return $data;
    }

    private function toTree($arr)
    {
        $tree = array();
        foreach ($arr as $k => $v) {
            $refer[$v['id']] = &$arr[$k];
        }
        foreach($arr as $k => $v){
            $pid = $v['pid'];
            if($pid == 0){
                $tree[] = & $arr[$k];
            }else{
                if(isset($refer[$pid])){
                    $refer[$pid]['child'][] = & $arr[$k];
                }
            }
        }
        Cache::set('leftnav',json_encode($tree),30);
        return $tree;
    }
    public function toArr($tree)
    {
        foreach ($tree as $k=>$v){
            if($v['child']){
                $arr = $v['child'];
                foreach ($arr as $ck => $cv) {
                    $tree[$cv['id']] = $arr[$ck];
                }
                unset($tree[$k]['child']);
            }
        }

        return $tree;
    }
}

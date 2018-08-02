<?php

namespace App;
use App\Model\Menu;
use Auth;
//这不是model类
class LeftNav
{
    public function getMenu()
    {
        $data =  Menu::where('status',1)->where('is_hide',0)->orderBy('sort','asc')->get()->toArray();
        return $this->toTree($data);
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
        return $tree;
    }
}

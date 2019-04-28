<?php

namespace App\Http\Controllers;

use Guzzle\Http\Message\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataFormat($model,$request)
    {
        $page  = $request->get('page') ? $request->get('page') : 1;
        $limit = $request->get('limit')? $request->get('limit') : 10;
        $start = ($page-1) * $limit;
        $data  = $model::where('status',1)->offset($start)->limit($limit)->orderBy('id','desc')->get()->toArray();
        $count = $model::where('status',1)->count();

        $return = array(
            'code'=>0,
            'count'=>$count,
            'msg'=>'查询成功',
            'data'=>$data,
        );
        return $return;
    }
    public function dataFormatMany($model,$request,$where = array(),$with = null)
    {
        //初始化
        $page  = $request->input('page') ? $request->input('page') : 1;
        $limit = $request->input('limit')? $request->input('limit') : 20;
        $field = $request->input('field')? $request->input('field') :'id';
        $order = $request->input('order')? $request->input('order') :'desc';
        $start = ($page-1) * $limit;
        //判断是否有关键字
        if(count($where) > 0){
            $model = $model->where($where);
        }
        if($with != null){
            $model = $model->with($with);
        }
        $data  = $model->offset($start)->limit($limit)->orderBy($field,$order)->get()->toArray();
        $count = $model->where('status',1)->count();

        $pages = ceil($count/$limit);
        if($with != 0 ){
            foreach ($data as $k=>&$item)
            {
                $item = array_merge($item,$item['options']);
            }
        }
        $return = array(
            'code'=>0,
            'count'=>$count,
            'msg'=>'查询成功',
            'data'=>$data,
            'pages'=>$pages,
        );
        return $return;
    }
    //简单返回
    public function qhc($code,$message,$data='')
    {
        $return  = array(
            'code' => $code,
            'message'=>$message,
            'data'=>$data
        );
        return  $return;
    }
}

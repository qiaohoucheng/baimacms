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

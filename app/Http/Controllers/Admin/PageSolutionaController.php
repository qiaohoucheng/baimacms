<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class PageSolutionaController extends Controller
{
    protected $temp;
    public function __construct(Request $request)
    {
        //也可以写成中间件
        $this->temp = config('view.temp_url').'.'.$request->route()->getName();
    }

    //:get
    public function index(Request $request)
    {
        $data = DB::table('page_data')->where('module_id','3')->get()->toArray();
        foreach ($data as $k =>$v){
            if($v->content){
                $arr['C_'.$v->num] = $v->content;
            }
            if($v->neirong){
                $arr['E_'.$v->num] = $v->neirong;
            }
            if($v->link){
                $arr['U_'.$v->num] = $v->link;
            }
        }
        return view( $this->temp ,compact('arr'));
    }
    public function store(Request $request)
    {
        $post = $request->input();
        foreach ($post as $key =>$value){
            if(strpos($key,'_')){
                list($e,$n) = explode('_',$key);
                switch ($e){
                    case 'C':
                        $arr[$n]['content']  = $value;
                        break;
                    case 'E':
                        $arr[$n]['neirong']  = $value;
                        break;
                    case 'U':
                        $arr[$n]['link']  = $value;
                        break;
                }
            }
        }
        if(count($arr) >0){
            foreach ($arr as $index =>$item){
                DB::table('page_data')->where('module_id','3')->where('num',$index)->update($item);
            }
        }
        return $this->qhc(0,'设置成功');
    }
}

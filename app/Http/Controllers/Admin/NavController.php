<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Nav;
class NavController extends Controller
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
        if($request->ajax()){
            $data = Nav::all();
            $return = array(
                'code'=>0,
                'msg'=>'查询成功',
                'data'=>$data,
            );
            return $return;
        }else{
            return view( $this->temp );
        }

    }
    //:get    :route /website/create
    public function create()
    {
        $list = Nav::where('pid','0')->orderBy('sort','asc')->get()->toArray();
        return view( $this->temp ,compact('list'));
    }
    //:post   :route /website
    public function store(Request $request)
    {
        if($request->input('title') && $request->input('url')){
            $menu = new Nav;
            $menu->title = $request->input('title');
            $menu->url = $request->input('url');
            $menu->sort = $request->input('sort',1);
            $menu->pid = $request->input('pid',0);
            $menu->is_hide = $request->input('is_hide',0);
            $menu->save();
            if($menu->id > 0){
                $return['code'] = 1;
                $return['message'] = '添加成功';
            }else{
                $return['code'] = 1002;
                $return['message'] = '添加失败';
            }
        }else{
            $return['code'] = 1001;
            $return['message'] = '缺少参数';
        }
        return $return;
    }
    //:delete  :route /website/{id}
    public function destroy()
    {

    }
    //:get  :route /website/{id}/edit
    public function edit()
    {
        return view( $this->temp );
    }
    //:put or patch  :route /website/{id}
    public function save()
    {

    }
    //:get   :route /webiste/{id}
    public function show()
    {
        return view( $this->temp );
    }
}

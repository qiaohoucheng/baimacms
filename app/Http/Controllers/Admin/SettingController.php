<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;

class SettingController extends Controller
{
    protected $temp;
    public function __construct(Request $request)
    {
        //也可以写成中间件
        $this->temp = config('view.temp_url').'.'.$request->route()->getName();
    }

    //:get
    public function index()
    {
        $data = Setting::find(1);
        return view( $this->temp ,compact('data'));
    }
    //:get    :route /website/create
    public function create()
    {
        return view( $this->temp );
    }
    //:post   :route /website
    public function store(Request $request)
    {
        $data = Setting::find(1);
        if(!$data){
            $data = new Setting();
        }
        if($request->input('sitename')){
            $data->sitename = $request->input('sitename');
        }
        if($request->input('domain')){
            $data->domain = $request->input('domain');
        }
        if($request->input('cache')){
            $data->cache = $request->input('cache');
        }
        if($request->input('upload_max')){
            $data->upload_max = $request->input('upload_max');
        }
        if($request->input('upload_type')){
            $data->upload_type = $request->input('upload_type');
        }
        if($request->input('web_title')){
            $data->web_title = $request->input('web_title');
        }
        if($request->input('web_keywords')){
            $data->web_keywords = $request->input('web_keywords');
        }
        if($request->input('web_descript')){
            $data->web_descript = $request->input('web_descript');
        }
        if($request->input('web_copyright')){
            $data->web_copyright = $request->input('web_copyright');
        }
        $res = $data->save();
        if($res == true){
            return $this->qhc(1,'设置成功！');
        }else{
            return $this->qhc(0,'设置失败！');
        }
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

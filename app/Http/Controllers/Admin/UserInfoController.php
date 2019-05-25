<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserInfoController extends Controller
{
    protected $temp;
    public function __construct(Request $request)
    {
        list($a) = explode('/',$request->route()->uri());
        //也可以写成中间件
        $this->temp = config('view.temp_url').'.'.$a.'.'.$request->route()->getName();
    }

    //:get
    public function index()
    {
        $user = Auth::user();
        return view( $this->temp ,compact('user'));
    }
    //:get    :route /website/create
    public function create()
    {
        return view( $this->temp );
    }
    //:post   :route /website
    public function store(Request $request)
    {
        $rules = [
            'id'=>'required',
        ];
        $message = [
            'id.required' => '请登录',
        ];
        $post = $request->input('element');
        $validator = Validator::make($request->input(), $rules, $message);
        if ($validator->fails()){
            return $this->qhc(0,'缺少参数');
        }else{
            $r = User::where('id',$request->input('id'))->update($post);
            if(isset($r) && $r>0){
                return $this->qhc(200,'操作成功！');
            }else{
                return $this->qhc(1001,'操作失败！');
            }
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

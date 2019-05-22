<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
class UserPasswordController extends Controller
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
        return view( $this->temp );
    }
    //:get    :route /website/create
    public function create()
    {
        return view( $this->temp );
    }
    //:post   :route /website
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->id >0){
            $rules = [
                'password'=>'required',
                'oldPassword'=>'required',
            ];
            $message = [
                'password.required' => '请添加密码',
                'oldPassword.required' => '请填写当前密码',
            ];

            $validator = Validator::make($request->input(), $rules, $message);
            if ($validator->fails()){
                return $this->qhc(0,'缺少参数');
            }else{
                $old_password = $request->input('oldPassword');

                $users = User::find($user->id);
                if(Hash::check($old_password, $users->password)){
                    $users->password = bcrypt($request->input('password'));
                    $r = $users->save();
                    if($r){
                        return $this->qhc(200,'操作成功！');
                    }else{
                        return $this->qhc(1001,'操作失败！');
                    }
                }else{
                    return $this->qhc(1008,'当前密码不正确！请重新输入');
                }
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

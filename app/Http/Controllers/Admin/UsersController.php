<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
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
        //$role = Role::create(['name' => 'writer']);
        if($request->ajax()){
            return  $this->dataFormatMany(new User(),$request,[]);
        }
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
        $rules = [
            'name'=>'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $message = [
            'name.required' => '请添加标题',
            'email.required' => '请添加邮箱',
            'password.required' => '请添加密码',
        ];
        $validator = Validator::make($request->input(), $rules, $message);
        if ($validator->fails()){
            return $this->qhc(0,'缺少参数');
        }else{
            $post = $request->input();
            $post['password'] = bcrypt($post['password']);
            $hasone = User::where('email',$post['email'])->where('status',1)->count();
            if($hasone >0){
                return $this->qhc(1002,'邮箱已注册！');
            }else{
                $r = User::create($post);
                if(isset($r->id) && $r->id >0){
                    return $this->qhc(200,'新建成功！');
                }else{
                    return $this->qhc(1001,'新建失败！');
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

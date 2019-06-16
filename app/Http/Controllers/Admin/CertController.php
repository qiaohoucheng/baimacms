<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cert;
use Validator;
use Illuminate\Support\Facades\DB;

class CertController extends Controller
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
            return  $this->dataFormatMany(new Cert(),$request,[]);
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
            'title'=>'required',
        ];
        $message = [
            'title.required' => '请添加标题',
        ];
        $validator = Validator::make($request->input(), $rules, $message);
        if ($validator->fails()){
            return $this->qhc(0,'缺少参数');
        }else{
            $post = $request->input();
            unset($post['_token']);
            $r = Cert::create($post);
            if(isset($r->id) && $r->id >0){
                Cert::where('id',$r->id)->update(['sort'=>$r->id]);
                return $this->qhc(200,'新建成功！');
            }else{
                return $this->qhc(1001,'新建失败！');
            }
        }
    }
    public function destroy(Request $request)
    {
        $post = Cert::find($request->get('id'));
        if($post->delete()){
            return $this->qhc('200' ,'删除成功！');
        }
        return $this->qhc('1001','删除失败！');
    }
    //:get  :route /website/{id}/edit
    public function edit($id)
    {
        $info = Cert::find($id)->toArray();
        return view( $this->temp ,compact('id','info'));
    }
    //:put or patch  :route /website/{id}
    public function update(Request $request,$id)
    {
        $rules = [
            'title'=>'required',
        ];
        $message = [
            'title.required' => '请添加标题',
        ];
        $validator = Validator::make($request->input(), $rules, $message);
        if ($validator->fails()){
            return $this->qhc(0,'缺少参数');
        }else{
            $post['title'] = $request->input('title');
            $post['url'] = $request->input('url');
            $post['type'] = $request->input('type');
            $post['status'] = $request->input('status');
            $r = Cert::where('id',$id)->update($post);
            if($r >0){

                return $this->qhc(200,'修改成功！');
            }else{
                return $this->qhc(1001,'修改失败！');
            }
        }
    }
    //:get   :route /webiste/{id}
    public function show()
    {
        return view( $this->temp );
    }
    //move
    public function move(Request $request)
    {
        $id1 = $request->get('id1');
        $id2 = $request->get('id2');
        if($id1 && $id2){
            $res = DB::update('update baima_cert as c1 join  baima_cert as c2 on (c1.id = ? and c2.id = ? ) set c1.sort = c2.sort,c2.sort = c1.sort', [$id1,$id2]);
            if($res >0){
                return $this->qhc('200' ,'移动成功！');
            }
            return $this->qhc('1001' ,'移动失败！');
        }
        abort('404');
    }
}

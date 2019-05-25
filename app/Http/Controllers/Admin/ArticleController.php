<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Model\Category;

class ArticleController extends Controller
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
            return  $this->dataFormatMany(new Article(),$request,['is_del'=>0],'category');
        }
        return view( $this->temp );
    }
    //:get    :route /website/create
    public function create()
    {
        $category = Category::all()->toArray();
        $category_tree  =$this->list_to_tree($category);

        return view( $this->temp ,compact('category_tree'));
    }
    //:post   :route /website
    public function store(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'title'=>'required',
            'content'=>'required',
        ];
        $message = [
            'title.required' => '请添加标题',
            'content.required' => '请添加内容',
        ];
        $post = $request->input('element');
        $validator = Validator::make($post, $rules, $message);
        if ($validator->fails()){
            return $this->qhc(0,'缺少参数');
        }else{
            if(isset($post['tags'])){
                $post['tags'] = implode(',',$post['tags']);
            }
            $post['u_id'] = $user->id;
            //dd($post);
            $r = Article::create($post);
            if(isset($r->id) && $r->id >0){
                return $this->qhc(200,'新建成功！');
            }else{
                return $this->qhc(1001,'新建失败！');
            }
        }
    }
    //:delete  :route /website/{id}
    public function destroy(Request $request)
    {
        $post = Article::find($request->get('id'));
        $post->is_del = 1;
        $r = $post->save();
        if($r){
            return $this->qhc('200' ,'删除成功！');
        }
        return $this->qhc('1001','删除失败！');
    }
    //:get  :route /website/{id}/edit
    public function edit($id)
    {
        $info = Article::with('post')->find($id)->toArray();
        if(isset($info['tags']) && $info['tags']!=''){
            $info['tags']= explode(',',$info['tags']);
        }else{
            $info['tags']= array();
        }

        $category = Category::all()->toArray();
        $category_tree  =$this->list_to_tree($category);
        return view( $this->temp ,compact('id','info','category_tree'));
    }
    public function update(Request $request,$id)
    {
        $user = Auth::user();
        $rules = [
            'title'=>'required',
            'content'=>'required',
        ];
        $message = [
            'title.required' => '请添加标题',
            'content.required' => '请添加内容',
        ];
        $post = $request->input('element');
        $validator = Validator::make($post, $rules, $message);
        if ($validator->fails()){
            return $this->qhc(0,'缺少参数');
        }else{
            if(isset($post['tags'])){
                $post['tags'] = implode(',',$post['tags']);
            }
            $post['u_id'] = $user->id;
            $r = Article::where('id',$id)->update($post);
            if($r >0){
                return $this->qhc(200,'修改成功！');
            }else{
                return $this->qhc(1001,'修改失败！');
            }
        }
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
    //move
    public function move(Request $request)
    {
        $id1 = $request->get('id1');
        $id2 = $request->get('id2');
        if($id1 && $id2){
            $res = DB::update('update baima_articles as c1 join  baima_articles as c2 on (c1.id = ? and c2.id =?) set c1.sort = c2.sort,c2.sort = c1.sort', [$id1,$id2]);
            if($res >0){
                return $this->qhc('200' ,'移动成功！');
            }
            return $this->qhc('1001' ,'移动失败！');
        }
        abort('404');
    }
}

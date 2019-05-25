<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Model\Category;
class TypeController extends Controller
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
            $data = Category::all();
            return $this->qhc(0,'查询成功',$data);
        }
            return view( $this->temp );

    }
    //:get    :route /website/create
    public function create()
    {
        $list = Category::where('pid','0')->orderBy('sort','asc')->get()->toArray();
        return view( $this->temp ,compact('list'));
    }
    //:post   :route /website
    public function store(Request $request)
    {
        if($request->input('title')){
            $category = new Category();
            $category->title = $request->input('title');
            $category->pid = $request->input('pid',0);
            $category->save();
            if($category->id > 0){
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
    public function destroy(Request $request)
    {
        $count = Article::where('category_id',$request->get('id'))->count();
        $tcount = Category::where('pid',$request->get('id'))->count();
        if($count >0 || $tcount){
            return $this->qhc('2001' ,'删除失败！分类下有关联文章或子分类');
        }else{
            $post = Category::find($request->get('id'));
            if($post->delete()){
                return $this->qhc('200' ,'删除成功！');
            }
            return $this->qhc('1001','删除失败！');
        }

    }
    //:get  :route /website/{id}/edit
    public function edit($id)
    {
        $info = Category::find($id)->toArray();
        return view( $this->temp ,compact('id','info'));
    }
    //:put or patch  :route /website/{id}
    public function update(Request $request,$id)
    {
        if($id >0){
            $text = $request->input('text');
            $cnt = Category::where('title',$text)->where('id','<>',$id)->count();
            if($cnt >0){
                return $this->qhc('1001','分类名称已存在！');
            }
            $Model = Category::find($id);
            $Model->title = $text;
            $r = $Model->save();
            if($r){
                return $this->qhc('200','修改成功！');
            }else{
                return $this->qhc('1001','修改失败！');
            }
        }
    }
    //:get   :route /webiste/{id}
    public function show()
    {
        return view( $this->temp );
    }
}

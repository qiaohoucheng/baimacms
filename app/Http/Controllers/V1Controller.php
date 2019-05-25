<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Setting;
use App\Model\Carousel;
use App\Model\Link;
use App\Model\Article;
class V1Controller extends Controller
{
    //基本信息
    public function get_config(){
        $data = Setting::find(1)->toArray();
        return $this->qhc('200','success',$data);
    }
    //轮播图
    public function get_banner(){
        $data = Carousel::where('status',1)->with(['post'])->orderBy('sort','desc')->get()->toArray();
        foreach ($data as $k=>&$v){
            $v['name'] ='了解智能变运维管理方案';
            if(isset($v['post'])){
                $v['img'] = $v['post']['url'];
            }else{
                $v['img'] ='';
            }
        }
        return $this->qhc('200','success',$data);
    }
    //成功案例
    public function get_link(){
        $data = Link::where('status',1)->with(['post'])->orderBy('sort','desc')->get()->toArray();
        foreach ($data as $k=>&$v){
            if(isset($v['post'])){
                $v['img'] = $v['post']['url'];
            }else{
                $v['img'] ='';
            }
        }
        return $this->qhc('200','success',$data);
    }
    //文章列表
    public function post_lists(){
        $data['first'] = Article::where('status',1)
            ->where('is_del',0)
            ->with(['post'])
            ->select('id','title','pic_id','created_at as date')
            ->orderBy('weight','desc')
            ->orderBy('id','desc')
            ->first()
            ->toArray();
        $data['list']  = Article::where('status',1)
            ->where('is_del',0)
            ->with(['category'])
            ->select('id','title','category_id','pic_id','created_at as date')
            ->orderBy('weight','desc')
            ->orderBy('id','desc')
            ->skip(1)
            ->take('4')
            ->get()
            ->toArray();
        if($data['first']){
            if(isset($data['first']['post'])){
                $data['first']['img'] = $data['first']['post']['url'];
            }
        }
        foreach ($data['list'] as $k=>&$v){
            if(isset($v['category'])){
                $v['type'] = $v['category']['title'];
            }else{
                $v['type'] = '新闻';
            }
            if(isset($v['post'])){
                $v['img'] = $v['post']['url'];
            }
            $v['date'] = date('Y年m月d日',strtotime($v['date']));
        }
        return $this->qhc('200','success',$data);
    }
    //文章详情
    public function post_detail($id){
        if($id >0){
            $data['info'] = Article::where('id',$id)->first()->toArray();
            if($data['info']){
                $data['info']['date'] = date('Y年m月d日',strtotime($data['info']['created_at']));
            }
            $data['prev'] = $this->getPrevArticleId($id);
            $data['next'] = $this->getNextArticleId($id);
            $data['list'] = Article::where('status',1)
                ->where('is_del',0)
                ->orderBy('id','desc')->take(5)->get()->toArray();
            return $this->qhc('200','success',$data);
        }
        return $this->qhc('1001','error');
    }
    protected function getPrevArticleId($id)
    {
        return Article::where('id', '<', $id)
            ->select('id','title')
            ->orderBy('id','desc')
            ->first();
    }

    protected function getNextArticleId($id)
    {
        return Article::where('id', '>', $id)
            ->select('id','title')
            ->orderBy('id','desc')
            ->first();
    }
}

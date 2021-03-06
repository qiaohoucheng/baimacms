<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Setting;
use App\Model\Carousel;
use App\Model\Link;
use App\Model\Article;
use App\Model\Cases;
use App\Model\PageData;
use Illuminate\Support\Facades\DB;
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
            $v['name'] ='了解智慧能源管理解决方案';
            if(isset($v['post'])){
                $v['img'] = $v['post']['url'];
            }else{
                $v['img'] ='';
            }
        }
        return $this->qhc('200','success',$data);
    }
    //首页设置
    public function  get_index_setting(){
        $data = DB::table('page_data')->where('module_id',1)->get()->toArray();
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
        return $this->qhc('200','success',$arr);
    }
    //友情链接
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
    //成功案例
    public function get_case(){
        $data = Cases::where('status',1)->with(['post'])->orderBy('sort','desc')->get()->toArray();
        foreach ($data as $k=>&$v){
            if(isset($v['post'])){
                $v['img'] = $v['post']['url'];
            }else{
                $v['img'] ='';
            }
        }
        return $this->qhc('200','success',$data);
    }
    public function get_solution_a(){
        $data = DB::table('page_data')->where('module_id',3)->get()->toArray();
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

        return $this->qhc('200','success',$arr);
    }
    public function get_cert_list(){
        $data = DB::table('cert')->where('status',1)->orderBy('sort','desc')->get()->toArray();
        $arr=[];
        foreach ($data as $key=>$val){
            if($val->type ==1){
                $arr['g'][] = $val;
            }else{
                $arr['z'][] = $val;
            }
        }
        return $this->qhc('200','success',$arr);
    }
    public function get_solution_b(){
        $data = DB::table('page_data')->where('module_id',4)->get()->toArray();
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
        return $this->qhc('200','success',$arr);
    }
    public function get_solution_c(){
        $data = DB::table('page_data')->where('module_id',6)->get()->toArray();
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
        return $this->qhc('200','success',$arr);
    }
    public function get_download(){
        $data = DB::table('page_data')->where('module_id',2)->get()->toArray();
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
        return $this->qhc('200','success',$arr);
    }
    public function get_service(){
        $data = DB::table('page_data')->where('module_id',5)->get()->toArray();
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
        return $this->qhc('200','success',$arr);
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
            ->where('status',1)
            ->where('is_del',0)
            ->select('id','title')
            ->orderBy('id','desc')
            ->first();
    }

    protected function getNextArticleId($id)
    {
        return Article::where('id', '>', $id)
            ->where('status',1)
            ->where('is_del',0)
            ->select('id','title')
            ->orderBy('id','desc')
            ->first();
    }
}

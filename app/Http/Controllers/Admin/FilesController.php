<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cos;
use App\Model\Files;

class FilesController extends Controller
{
   public function upload(Request $request)
   {
       //1.获取文件
       $file = $request->file('file');
       if($file){
           //2 判断文件是否上传过  true -> 5  false -> 3
           $file_model = Files::firstOrNew(['md5'=>md5_file($file->getPathname())]);

           if(!$file_model->id){
               //3.上传cos
               $Cos = new Cos();
               $filename = time().rand('100','999').'.'.$file->guessClientExtension();
               $object ='file/'.$filename;
               $url = $Cos->putObject($object,$file->getPathname());
               //4.上传到数据库
               if(isset($url) && strlen($url) > 0){
                   $file_model->filename = $filename;
                   $file_model->originalname = $file->getClientOriginalName();
                   $file_model->type = $file->getClientMimeType();
                   $file_model->size = $file->getClientSize();
                   $file_model->suffix = $file->guessClientExtension();
                   $file_model->url = $url;

                   $file_model->save();
               }else{
                   return array('code'=>0,'message'=>'上传失败');
               }
           }
           return array('code'=>1,'message'=>'上传成功','data'=>array('pic_id' => $file_model->id));
           //5.返回图片信息
       }
       abort('404');
   }
   public function download($filename,$path)
   {
        $Cos = new Cos();
        return $Cos->getObject($filename,$path);
   }
}
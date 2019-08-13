<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cos;
use App\Model\Files;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;

class FilesController extends Controller
{
   public function upload(Request $request)
   {
       //1.获取文件
       $file = $request->file('file');
       $is_editor = $request->input('is_editor',0);
       if($file -> isValid()){
           //2 判断文件是否上传过  true -> 5  false -> 3
           $file_model = Files::firstOrNew(['md5'=>md5_file($file->getPathname())]);

           if(!$file_model->id){
               //3.上传
               $filename = time().rand('100','999').'.'.$file->guessClientExtension();
               //$object ='upload/pic/'.$filename;
               //$Cos = new Cos();
               //$url = $Cos->putObject($object,$file->getPathname());
               /*   qiniu   */
               $upManager = new UploadManager();
               $auth = new Auth('--DBJ2nP29csUJBGZ6AZbftIEAvrcnVCSBOP7nVF', 'dHx5T50KxQE-aLaxb6g6sBCt0iZZQaL2g4gouEYz');
               $token = $auth->uploadToken('nanjing-dev');
               //$content = file_get_contents($file->getPathname());

               list($ret, $error) = $upManager->putFile($token, $filename, $file->getPathname());

               //$a = file_put_contents(public_path($object),$content);
               //4.上传到数据库
               if($ret){
                   $file_model->filename = $filename;
                   $file_model->originalname = $file->getClientOriginalName();
                   $file_model->type = $file->getClientMimeType();
                   $file_model->size = $file->getClientSize();
                   $file_model->suffix = $file->guessClientExtension();
                   $file_model->url = 'http://cloud.nanjingrongshu.cn/'.$filename;

                   $file_model->save();
               }else{
                   return array('code'=>0,'message'=>'上传失败');
               }
           }
           if($is_editor ==1){
               return array('errno'=>0,'message'=>'上传成功','data'=>array($file_model->url));
           }else{
               return array('code'=>1,'message'=>'上传成功','data'=>array('pic_id' => $file_model->id,'url'=>$file_model->url));
           }

           //5.返回图片信息
       }
       abort('404');
   }
   public function upload_os(){

   }
   public function download($filename,$path)
   {
        $Cos = new Cos();
        return $Cos->getObject($filename,$path);
   }
}

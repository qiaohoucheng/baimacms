<?php

namespace App;
use Qcloud\Cos\Client;

class Cos
{
    protected $Client;
    protected $bucket;

    public function __construct()
    {
        $this->Client = new Client(
            array('region' => config('baima.cos_region'),
                'credentials'=> array(
                    'appId' => config('baima.cos_appId'),
                    'secretId'    => config('baima.cos_secretId'),
                    'secretKey' =>  config('baima.cos_secretKey')
                )
            ));
        $this->bucket = config('baima.cos_bucket');
    }
    //存储桶列表
    public function listBuckets(){
        return $this->Client->listBuckets();
    }
    //上传文件
    public function putObject($object,$content)
    {
        try {
            $this->Client->putObject(array('Bucket' =>$this->bucket, 'Key' => $object, 'Body' => $content));

        } catch (OssException $e) {
            print $e->getMessage();
            echo $e->getMessage() . PHP_EOL;
        }
        return $this->Client->getObjectUrl($this->bucket,$object);
    }
}

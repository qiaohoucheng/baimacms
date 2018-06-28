<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Qcloud\Cos\Client;
class IndexController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index(Request $request)
    {

    }
    /**
     * 上传到腾讯云
     * @param $object
     * @param $content
     * @return mixed
     */
    public function uploadcos($object, $content)
    {
        $bucket = config('baima.cos_bucket');
        try {
            $cosClient = new Client(array('region' => config('baima.cos_region'),
                'credentials'=> array(
                    'appId' => config('baima.cos_appId'),
                    'secretId'  => config('baima.cos_secretId'),
                    'secretKey' => config('baima.cos_secretKey')
                )));
            //$result = $cosClient->listBuckets();
            //$result = $cosClient->createBucket(array('Bucket' => 'olympic-2108-6-19'));
            $cosClient->putObject(array('Bucket' =>$bucket, 'Key' => $object, 'Body' => $content));
        } catch (OssException $e) {
            print $e->getMessage();
            echo $e->getMessage() . PHP_EOL;
        }
        return $cosClient->getObjectUrl($bucket,$object);
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class QrcodeController extends Controller
{
    protected $temp;
    public function __construct(Request $request)
    {
        //也可以写成中间件
        $this->temp = config('view.temp_url').'.'.$request->route()->getName();
    }

    //:get
    public function index()
    {
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
        if(!file_exists(public_path('qrcodes'))){
            mkdir(public_path('qrcodes'));
        }
        $color = '0,0,0';
        $bgcolor = '255,255,255';
        $title = $request->input('title') ? $request->input('title') :'http://qiaohoucheng.com';
        $size  = $request->input('size') ? $request->input('size') :'300';
        $margin = $request->input('margin') ? $request->input('margin') :'1';

        if($request->input('color')){
            preg_match('/(?:\()(.*)(?:\))/i', $request->input('color'), $matches, PREG_OFFSET_CAPTURE);
            $color = $matches[1][0];
        }
        if($request->input('bgcolor')){
            preg_match('/(?:\()(.*)(?:\))/i', $request->input('bgcolor'), $matches, PREG_OFFSET_CAPTURE);
            $bgcolor = $matches[1][0];
        }
        list($r,$g,$b) = explode(',',$color);
        list($br,$bg,$bb) = explode(',',$bgcolor);
        //->merge('/public/qrcodes/laravel.png',.15)
        QrCode::format('png')
            ->size($size)
            ->color($r,$g,$b)
            ->margin($margin)
            ->backgroundColor($br,$bg,$bb)
            ->generate($title,public_path('qrcodes/qrcode.png'));
        return array('code'=>1,'pic_url'=>'/qrcodes/qrcode.png');

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

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Model\Files;
use Auth;
use App\Model\Qrhistory;
class QrcodeController extends Controller
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
            return $this->dataFormat(new Qrhistory(),$request);
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
        if($request->input('pic_id')){
            $file_model = Files::find($request->input('pic_id'));
            $filename = Auth::user()->id.'.png';
            $content = file_get_contents($file_model->url);
            file_put_contents(public_path($filename),$content);
            QrCode::format('png')
                ->size($size)
                ->merge('/public/'.$filename,.15)
                ->color($r,$g,$b)
                ->margin($margin)
                ->backgroundColor($br,$bg,$bb)
                ->generate($title,public_path('qrcodes/qrcode.png'));
        }else{
            QrCode::format('png')
                ->size($size)
                ->color($r,$g,$b)
                ->margin($margin)
                ->backgroundColor($br,$bg,$bb)
                ->generate($title,public_path('qrcodes/qrcode.png'));
        }
        if(file_exists(public_path('qrcodes/qrcode.png'))){
            $qrcode = new Qrhistory();

            $qrcode->title = $title;
            $qrcode->desc = $request->input('desc');
            $qrcode->pic_id = $request->input('pic_id');
            $qrcode->size = $size;
            $qrcode->color = $request->input('color');
            $qrcode->bgcolor = $request->input('bgcolor');
            $qrcode->margin = $margin;
            $qrcode->save();
        }
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

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    //
    protected $fillable = [
        'title', 'pic_id', 'link','sort'
    ];
    public function post()
    {
        return $this->belongsTo('App\Model\Files','pic_id','id');
    }
}

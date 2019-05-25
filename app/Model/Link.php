<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    protected $fillable = [
        'title', 'pic_id', 'url','sort'
    ];
    public function post()
    {
        return $this->belongsTo('App\Model\Files','pic_id','id');
    }
}

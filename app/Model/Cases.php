<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    //
    protected $table = 'case';
    protected $fillable = [
        'title', 'pic_id', 'intro','sort','status'
    ];
    public function post()
    {
        return $this->belongsTo('App\Model\Files','pic_id','id');
    }
}

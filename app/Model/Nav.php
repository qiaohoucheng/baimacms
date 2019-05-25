<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    //
    //
    protected $fillable = [
        'title','sort'
    ];
    public function post()
    {
        return $this->belongsTo('App\Model\Files','pic_id','id');
    }
}

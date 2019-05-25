<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'excerpt','pic_id','author','category_id','tags'
    ];
    public function post()
    {
        return $this->belongsTo('App\Model\Files','pic_id','id');
    }
    public function category()
    {
        return $this->belongsTo('App\Model\Category','category_id','id');
    }
}

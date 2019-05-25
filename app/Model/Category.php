<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';
    public function post()
    {
        return $this->hasMany('App\Model\Article','id','category_id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'sitename', 'domain', 'cache','upload_max','upload_type','web_title','web_keywords','web_descript','web_copyright'
        ,'intro','address','tel','fax','mobile','email'
    ];
}

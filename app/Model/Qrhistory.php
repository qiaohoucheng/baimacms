<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Qrhistory extends Model
{
    protected $table = 'qrcode';
    protected $fillable = [
        'title', 'desc', 'pic_id','size','color','bgcolor','margin',
    ];

}

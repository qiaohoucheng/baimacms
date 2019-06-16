<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cert extends Model
{
    protected $table = 'cert';
    protected $fillable = [
        'title', 'url','status','type'
    ];
}

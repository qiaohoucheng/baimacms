<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';
    protected $dateFormat = 'U';
    protected $fillable = ['md5','filename','originalname','type','size','suffix','url'];
}

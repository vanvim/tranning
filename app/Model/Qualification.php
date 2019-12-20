<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    public $table = 'qualification';
    public $timestamps = false;

    public function teacher(){
        return $this->hasMany('App\Model\Teacher','qualification_id','id');
    }
}

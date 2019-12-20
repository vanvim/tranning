<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    public $table = 'class';
    public $timestamps = false;

    public function student(){
        return $this->hasMany('App\Model\Course','class_id','id');
    }

    public function course(){
        return $this->belongsTo('App\Model\Course','course_id','id');
    }
    public function teacher(){
        return $this->belongsTo('App\Model\Teacher','teache_id','id');
    }

    public function pay(){
        return $this->hasMany('App\Model\Pay','class_id','id');
    }
}

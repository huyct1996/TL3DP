<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = 'news';

    public function type_news() {
    	return $this->belongTo('App\type_news');
    }
    public function comment() {
    	return $this->hasMany('App\comment');
    }
}

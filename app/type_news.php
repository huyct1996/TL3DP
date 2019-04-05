<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_news extends Model
{
    protected $table = 'type_news';

    public function news()
    {
    	return $this->hasMany('App\news');
    }
}

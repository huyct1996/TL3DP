<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comment';

    public function news()
    {
    	return $this->belongTo('App\news');
    }

    public function user() {
    	return $this->belongTo('App\User');
    }
}

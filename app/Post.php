<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Category(){

      return $this->hasMany('App\Category');

    }
}

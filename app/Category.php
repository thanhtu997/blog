<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','name','parent_id','thumbnail','slug','description'];

    public function posts(){
    	return $this->hasMany('App\Post');
    }
}

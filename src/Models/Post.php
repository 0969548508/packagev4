<?php

namespace nnbao\Press\Models;

use nnbao\press\Traits\LoadDataTrait;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use LoadDataTrait;
    protected $table = 'posts';

    public static function getAllPost(){
    	echo "this is all data in post table";
    }

    
}

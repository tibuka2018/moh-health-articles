<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'user_id',
    	'title',
    	'slug',
    	'image_id',
    	'category_id',
    	'views'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

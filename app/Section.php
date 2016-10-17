<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
    	'user_id',
    	'article_id',
    	'title',
    	'slug',
    	'content',
    	'image_id'
    ];

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }
}

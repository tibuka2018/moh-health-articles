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

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}

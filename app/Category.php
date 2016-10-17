<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = [
		'user_id',
		'name',
		'slug',
		'color'
	];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

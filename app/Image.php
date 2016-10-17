<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'user_id',
    	'url'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}

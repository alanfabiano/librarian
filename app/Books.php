<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Books extends Model implements SluggableInterface
{
	use SluggableTrait;

	protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
        'unique'     => true,
        'on_update'  => true
    ];

    protected $fillable = [
    	'title',
    	'slug',
    	'resume',
    	'active',
        'book_cover',
        'author_id'
    ];    

    public function authors()
    {
        return $this->belongsTo('App\Authors','author_id','id');
    }    

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    
}
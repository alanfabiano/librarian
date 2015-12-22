<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Authors extends Model implements SluggableInterface
{    
    use SluggableTrait;

	protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
        'unique'     => true,
        'on_update'  => true
    ];

    protected $fillable = [
    	'name',
        'photo',
    	'slug',
    	'active',
        'biography'
    ];

    public function books()
    {
        return $this->hasMany('App\Books','author_id');
    }    
}
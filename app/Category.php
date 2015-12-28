<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Category extends Model implements SluggableInterface
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
    	'slug',
    	'parent_id',
    	'status'
    ];

    public function books()
    {
        return $this->hasMany('App\Books','category_id','id');
    }

}

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

    public static function get_form_list()
    {
        $author = Authors::all(['id','name']);
        foreach($author as $k){
            $authors[ $k->id ] = $k->name;
        }
        return $authors;
    }
}
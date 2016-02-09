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

    public function CountBooks()
    {
        return $this->hasMany('App\Books','category_id','id')->count();
    }

    public static function get_form_list()
    {
        $category = Category::all(['name','id']);
        foreach($category as $k){
            $categories[ $k->id ] = $k->name;
        }
        return $categories;
    }
}

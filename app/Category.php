<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    public $timestamps = true;

    public function getRouteKeyName()
	{
	    return 'slug';
	} 

	 public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->category_name);
        });
    }


    //method for relationship to category type model
    
    public function categoryType(){

        return $this->belongsTo('App\CategoryType');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    protected $table='category_types';

    public $timestamps = true;

     
    //method for relationship to category model
    
    public function category(){

        return $this->hasMany('App\Category');
    }
}

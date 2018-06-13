<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name','description','price','image_path','path'];
	
    public function orders()
    {
    	return $this->belongsToMany(Order::class)
    	->withPivot('quantity');
    }
}

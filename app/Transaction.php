<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function orders()
    {
    	return $this->hasMany(Order::class);
    }
}

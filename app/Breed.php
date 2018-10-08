<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public function cats(){
    	return $this->hasMany('Furbook\Cat','breed_id','id');
    }
}

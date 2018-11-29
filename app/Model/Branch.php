<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function scopeRelTable($query){

        return $query->with(['address', 'company', 'businessInfo']);
    }

    

    
}

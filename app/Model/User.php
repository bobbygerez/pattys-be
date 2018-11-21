<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

// class User extends Model

class User extends Authenticatable 
{
    use HasApiTokens, Notifiable;
    
     protected $fillable = [
        'firstname', 'middlename', 'lastname', 'company', 'jobTitle', 'phone', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function roles(){
        return $this->belongsToMany('App\Model\Role', 'role_user', 'user_id', 'role_id');
    }

    public function holdings(){
        return $this->belongsToMany('App\Model\Holding', 'holding_user', 'user_id', 'holding_id');
    }
  
    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }

    public function menus(){
        return $this->belongsToMany('App\Model\Menu', 'menu_user', 'user_id', 'menu_id');
    }

    public function scopeRelTable($query){

        return $query->with(['roles.accessRights.menus']);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\CrudTrait;
use Backpack\Base\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;
class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
        */    
        /**
        * The attributes that are mass assignable.
        *
        * @var array
        */
        protected $fillable = [
            'username', 'email', 'password',
        ];

        /**
        * The attributes that should be hidden for arrays.
        *
        * @var array
        */
        protected $hidden = [
            'password', 'remember_token',
        ];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/ 

        /**
        * Send the password reset notification.
        *
        * @param  string  $token
        * @return void
        */
        public function sendPasswordResetNotification($token)
        {
            $this->notify(new ResetPasswordNotification($token));
        }
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
		public function admin()
		{
			return $this->hasOne('App\Models\Admin');
		}
		public function amc()
		{
			return $this->hasOne('App\Models\AMC');
		}
		public function member()
		{
			return $this->hasOne('App\Models\Member');
		}
		public function favorite(){
		    return $this->hasMany('App\user_favorite');
        }
	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/    
}

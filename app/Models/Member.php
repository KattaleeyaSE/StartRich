<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\User;
class Member extends User
{
    use CrudTrait;	
     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

        protected $table = 'members';
        protected $primaryKey = 'id';
        // public $timestamps = false;
        // protected $guarded = ['id'];
        protected $fillable = [
            'firstname',
            'lastname',
            'phone_number',
            'user_id',
        ];

        // protected $hidden = [];
        // protected $dates = [];

	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/ 
	
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
		public function user()
		{
			return $this->belongsTo('App\User');
		}

		public function favorite_funds()
		{
			return $this->belongsToMany('App\Models\MutualFund', 'member_fund', 'member_id', 'fund_id');
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuitabilityTestMember extends Model
{
   /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

        protected $table = 'suitability_test_members';
        protected $primaryKey = 'id';
        // public $timestamps = false;
        // protected $guarded = ['id'];
        protected $fillable = [
            'score',
            'member_id',
            'suitability_test_id',
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
		public function suitability_test()
		{
            return $this->hasOne('App\Models\SuitabilityTest');
		}

		public function member()
		{
            return $this->belongsTo('App\Models\Member');
		}
        
		public function suitability_test_answer()
		{
            return $this->hasMany('App\Models\SuitabilityTestMemberAnswer');
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

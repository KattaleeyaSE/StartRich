<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuitabilityTestMemberAnswer extends Model
{
   /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

        protected $table = 'suitability_test_member_answers';
        protected $primaryKey = 'id';
        // public $timestamps = false;
        // protected $guarded = ['id'];
        protected $fillable = [
            'suit_member_answer_id',
            'suit_test_member_id',
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
 
		public function suitability_test_member()
		{
            return $this->belongsTo('App\Models\SuitabilityTestMember');
		}

		public function suitability_test_answer()
		{
            return $this->hasOne('App\Models\SuitabilityQuestionAnswer');
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

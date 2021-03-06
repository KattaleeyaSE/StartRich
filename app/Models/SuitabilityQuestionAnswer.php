<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuitabilityQuestionAnswer extends Model
{
  /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

        protected $table = 'suitability_question_answers';
        protected $primaryKey = 'id';
        // public $timestamps = false;
        // protected $guarded = ['id'];
        protected $fillable = [
            'answer',
            'score',
            'suitability_question_id',
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

		public function suitability_question()
		{
			return $this->belongsTo('App\Models\SuitabilityQuestion');
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

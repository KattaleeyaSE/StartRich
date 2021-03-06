<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuitabilityTest extends Model
{
   /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

        protected $table = 'suitability_tests';
        protected $primaryKey = 'id';
        // public $timestamps = false;
        // protected $guarded = ['id'];
        protected $fillable = [
            'name',
            'description',
            'amc_id',
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
		public function amc()
		{
            return $this->belongsTo('App\Models\AMC');
		}

		public function suitability_test_results()
		{
			return $this->hasMany('App\Models\SuitabilityTestResult');
		}

		public function suitability_test_questions()
		{
			return $this->hasMany('App\Models\SuitabilityQuestion');
		}

		public function suitability_test_assets()
		{
			return $this->hasMany('App\Models\SuitabilityAsset');
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuitabilityTestResult extends Model
{
 /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

        protected $table = 'suitability_test_results';
        protected $primaryKey = 'id';
        // public $timestamps = false;
        // protected $guarded = ['id'];
        protected $fillable = [
            'max_score',
            'min_score',
            'type_of_investors',
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
            return $this->belongsTo('App\Models\SuitabilityTest');
		}

		public function suitability_asset_test()
		{
            return $this->belongsToMany('App\Models\SuitabilityAsset', 'suitability_asset_tests', 'suitability_result_id', 'suitability_asset_id')
			->withPivot('id','percent');
		}

		public function suitability_fund()
		{
            return $this->belongsToMany('App\Models\MutualFund', 'suitability_test_funds', 'suitability_result_id', 'invest_id');
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

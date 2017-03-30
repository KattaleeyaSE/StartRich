<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuitabilityAssetTest extends Model
{
 /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

        protected $table = 'suitability_asset_tests';
        protected $primaryKey = 'id';
        // public $timestamps = false;
        // protected $guarded = ['id'];
        protected $fillable = [
            'percent',
            'suitability_asset_id',
            'suitability_result_id',
            
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

		public function suitability_asset()
		{
			return $this->belongsTo('App\Models\SuitabilityAsset');
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

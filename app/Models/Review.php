<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /*
       |--------------------------------------------------------------------------
       | GLOBAL VARIABLES
       |--------------------------------------------------------------------------
       */

    protected $table = 'suitability_assets';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'name',
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
        return $this->belongsToMany('App\Models\SuitabilityTestResult', 'suitability_asset_tests', 'suitability_result_id', 'suitability_asset_id')
            ->withPivot('id','percent');
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

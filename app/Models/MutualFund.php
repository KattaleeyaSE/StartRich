<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\investment;
class MutualFund extends investment
{
    use CrudTrait;
    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    protected $table = 'investments';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'desc',
        'type',
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
    public function nav(){
        return $this->hasMany('App\Models\Nav','fund_id');
    }
    public function devidenHistory(){
        return $this->hasMany('App\devidendhistory');
    }
    public function listoffund(){
        return $this->hasMany('App\listoffund');
    }
    public function portfolio(){
        return $this->hasMany('App\portfolio');
    }
    public function purchasedetails(){
        return $this->hasMany('App\purchasedetail','fund_id');
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

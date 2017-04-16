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
        'amc_id',
        'name',
        'code',
        'type',
        'aimc_type',
        'management_company',
        'trustee',
        'payment_policy',
        'frequency',
        'approved_by',
        'supervision',
        'protected_fund',
        'name_of_guarantor',
        'fund_start',
        'fund_end',
        'risk_level',
        'net_asset_value',
        'investment_asset_detail',
        'strategy_detail',
        'factor_impact',
        'benchmark_detail',
        'type_of_investor',
        'major_risk_factor'
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

    // ไม่ใช้ละ
    public function nav(){
        return $this->hasMany('App\Models\Nav','fund_id');
    }
    public function devidenHistory(){
        return $this->hasMany('App\devidendhistory','fund_id');
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

    // ใช้อันนี้แทนนะ
    public function navs()
    {
        return $this->hasMany('App\Models\Nav', 'fund_id');
    }
    
    public function dividend_payments()
    {
        return $this->hasMany('App\Models\DividendPayment', 'fund_id');
    }

    public function fund_managers()
    {
        return $this->hasMany('App\Models\FundManager', 'fund_id');
    }

    public function portfolios()
    {
        return $this->hasMany('App\Models\Portfolio', 'fund_id');
    }

    public function purchase_details()
    {
        return $this->hasMany('App\Models\PurchaseDetail','fund_id');
    }

    public function asset_allocation()
    {
        return $this->hasOne('App\Models\AssetAllocation','fund_id');
    }

    public function holding_companies()
    {
        return $this->hasMany('App\Models\HoldingCompany','fund_id');
    }

    public function fees()
    {
        return $this->hasMany('App\Models\Fee','fund_id');
    }

    public function expenses()
    {
        return $this->hasMany('App\Models\Expense','fund_id');
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

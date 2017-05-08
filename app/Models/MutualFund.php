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
    public function getAssetAllocationData()
    {
        $allocation = $this->asset_allocation;

        return ($allocation == null) ? [0, 0, 0, 0] : [$allocation->stock, $allocation->bond, $allocation->cash, $allocation->other];
    }

    public function getUsers()
    {
        $members = $this->members;
        $users = collect();

        foreach ($members as $member) {
            $users->push($member->user);
        }

        return $users;
    }

    public function lastPastPerformance()
    {
        $max_date = $this->past_performances->max('date');

        return $this->past_performances->where('date', $max_date)->first();
    }

    public function lastPastPerforamce()
    {
        return $this->lastPastPerformance();
    }

    public function reviewedByMember($member_id)
    {
        foreach ($this->reviews as $review) {
            if ($review->member_id == $member_id) {
                return true;
            }
        }

        return false;
    }

    public function isFavoriteBy($member_id)
    {
        foreach ($this->members as $member) {
            if ($member->id == $member_id) {
                return true;
            }
        }

        return false;
    }

    public function getRate()
    {
        if($this->reviews->isEmpty()) { return 0; }

        return $this->reviews->avg('point');
    }

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
    // public function nav(){
    //     return $this->hasMany('App\Models\Nav','fund_id');
    // }
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
    public function nav()
    {
        return $this->hasOne('App\Models\Nav', 'fund_id');
    }

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

    public function purchase_detail()
    {
        return $this->hasOne('App\Models\PurchaseDetail','fund_id');
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

    public function past_performances()
    {
        return $this->hasMany('App\Models\PastPerformance','fund_id');
    }

    public function members()
    {
        return $this->belongsToMany('App\Models\Member', 'member_fund', 'fund_id', 'member_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\FundReview', 'fund_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopeFilter($query, $filter)
    {
        if (isset($filter['name'])) {
            $query->where('name', $filter['name']);
        }
        if (isset($filter['code'])) {
            $query->where('code', $filter['code']);
        }
        if (isset($filter['type'])) {
            $query->where('type', $filter['type']);
        }
        if (isset($filter['protected_fund'])) {
            $query->where('protected_fund', $filter['protected_fund']);
        }
        if (isset($filter['payment_policy'])) {
            $query->where('payment_policy', $filter['payment_policy']);
        }
        if (isset($filter['risk_level'])) {
            $query->where('risk_level', $filter['risk_level']);
        }
        if (isset($filter['min_first_purchase'])) {
            $query->whereHas('purchase_details', function ($query) use ($filter) {
                $query->where('min_first_purchase', $filter['min_first_purchase']);
            });
        }
        if (isset($filter['company_name'])) {
            $query->whereHas('amc', function ($query) use ($filter) {
                $query->where('company_name', $filter['company_name']);
            });
        }

        return $query;
    }

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastPerformance extends Model
{
	protected $guarded = [];

    public function fund()
    {
        return $this->belongsTo('App\Models\MutualFund', 'fund_id');
    }

    public function records()
    {
    	return $this->hasMany('App\Models\PastPerformanceRecord', 'past_performance_id');
    }

    public function fundReturn()
    {
    	return $this->hasMany('App\Models\PastPerformanceRecord', 'past_performance_id')->where('name', $this->fund->name)->first();
    }

    public function benchmark1()
    {
        return $this->hasMany('App\Models\PastPerformanceRecord', 'past_performance_id')->where('name', 'Benchmark 1')->first();
    }

    public function information_ratio()
    {
        return $this->hasMany('App\Models\PastPerformanceRecord', 'past_performance_id')->where('name', 'Information Ratio')->first();
    }

    public function standard_deviation()
    {
        return $this->hasMany('App\Models\PastPerformanceRecord', 'past_performance_id')->where('name', 'Standard Deviation')->first();
    }
}

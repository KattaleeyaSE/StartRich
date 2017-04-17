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
}

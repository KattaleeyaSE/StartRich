<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundManager extends Model
{
    protected $guarded = [];

    protected function getManagerNameAttribute()
    {
        return $this->attributes['name'];
    }

    protected function getManagerPositionAttribute()
    {
        return $this->attributes['position'];
    }

    public function fund()
    {
    	return $this->belongsTo('App\Models\MutualFund', 'fund_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoldingCompany extends Model
{
    protected $guarded = [];

    public function fund()
    {
    	return $this->belongsTo('App\Models\MutualFund', 'fund_id');
    }
}

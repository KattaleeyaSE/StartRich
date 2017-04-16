<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DividendPayment extends Model
{
	protected $guarded = [];
	
    public function fund()
    {
    	return $this->belongsTo('App\Models\MutualFund', 'fund_id');
    }

    public function getYear()
    {
    	return \Carbon\Carbon::createFromFormat('Y-m-d', $this->payment_date)->year;
    }
}

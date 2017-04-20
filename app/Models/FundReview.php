<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundReview extends Model
{
    protected $table = 'fund_reviews';
    protected $fillable = ['point', 'description', 'member_id', 'fund_id'];

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id', 'id');
    }
}

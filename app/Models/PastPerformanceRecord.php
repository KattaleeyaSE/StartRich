<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastPerformanceRecord extends Model
{
    protected $guarded = [];

    public function getThreeMonthAttribute()
    {
        return $this->attributes['3month'];
    }

    public function getSixMonthAttribute()
    {
        return $this->attributes['6month'];
    }

    public function getOneYearAttribute()
    {
        return $this->attributes['1year'];
    }

    public function getThreeYearAttribute()
    {
        return $this->attributes['3year'];
    }

    public function getFiveYearAttribute()
    {
        return $this->attributes['5year'];
    }

    public function getTenYearAttribute()
    {
        return $this->attributes['10year'];
    }
}

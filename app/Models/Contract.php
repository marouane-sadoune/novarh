<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Can;

class Contract extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function scopeInCompany($query)
    {
        return $query->whereHas('employee', function ($query) {
            $query->inCompany();
        });
    }
    public function getDurationAttribute()
    {
        return Carbon::parse($this->start_date)->diffForHumains($this->end_date);
    }
    public function getSearchByEmployee($query, $name)
    {
        return $query->whereHas('employee', function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        });
    }
    public function getTotaleEarning($monthYear)
    {
        return $this-> rate_type = 'monthly' ? $this->rate : $this->rate * Carbon::parse($monthYear)->daysInMonth;
    }
    
}

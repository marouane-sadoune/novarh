<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
    public function getDuration()
    {
        return Carbon::parse($this->start_date)->diffForHumains($this->end_date);
    }
}

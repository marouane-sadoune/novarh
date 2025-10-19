<?php

namespace App\Models;

use Carbon\Carbon;
use FontLib\Table\Type\name;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'details',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function scopeInCompany($query, $name)
    {
        return $query->whereHas('designation', function ($q) use ($name) {
            $q->where('name', 'LIKE', "%$name%");
        });
    }
    public function getDurationAttribute()
    {
        return Carbon::parse($this->start_date)->diffForHumans($this->end_date);
    }
    public function scopeSearchByEmployee($query, $name)
    {
        return $query->whereHas('employee', function ($q) use ($name) {
            $q->where('name', 'LIKE', "%$name%");
        });
    }
    public function getTotalEarnings($monthYear)
    {
        return $this->rate_type == 'monthly' ? $this->rate : $this->rate * Carbon::parse($monthYear)->daysInMonth;
    }
}

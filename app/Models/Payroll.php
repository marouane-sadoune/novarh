<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }public function Salaries()
    {
        return $this->hasMany(Salary::class);
    }
    public function paiments()
    {
        return $this->hasMany(Payment::class);
    }
    public function scopeInCompany($query, $companyId)
    {
        return $query->where('company_id', $this->company_id);

    }
    public function getMonthYearAttribute()
    {
        return $this->$this->year . ' ' . $this->month;
    }
    public function getMonthStringAttribute()
    {
        return Carbon::createFromDate($this->month_year)->format('F Y');
    }
}

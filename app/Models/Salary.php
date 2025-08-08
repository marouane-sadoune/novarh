<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'employee_id',
        'payroll_id',
        'gross_salary',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
}

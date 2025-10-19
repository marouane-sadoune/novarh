<?php

namespace App\Models;

use App\Services\NetPayCalculationsService;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'payroll_id',
        'employee_id',
        'gross_salary'
];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
    public function getBreakdownAttribute() {
        return (new NetPayCalculationsService($this->gross_salary));
    }
    public function getDeductionsAttribute() {
        return $this->breakdown->getDeductions();
    }
    public function getNetPayAttribute() 
    {
        return  $this->breakdown->getPaye();
    }
}

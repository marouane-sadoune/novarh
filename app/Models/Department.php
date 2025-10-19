<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'company_id'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function designations()
    {
        return $this->hasMany(Designation::class);
    }
    public function employees()
    {
        return $this->throughDesignations()->hasEmployees();
    }
    public function scopeInCompany($query)
    {
        return $query->where('company_id', session('company_id'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = [
        'name',
        'company_id',
    
    ];
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
        return $this->throughDesignation()->hasEmployees();
    }
    public function ScopeInSession($query)
    {
        return $query->where('companry_id', session('company_id'));
    }   
}
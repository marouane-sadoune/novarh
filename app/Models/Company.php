<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'logo',
        'website',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function designations()
    {
        return $this->throughDepartments()->designations();
    }
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/logo.jpg');
    }
}

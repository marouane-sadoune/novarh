<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //:
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
    ];
    protected function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    public function desgnation(){
        return $this->throughDepartment->hasDesgnation();
    }
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/default-company-logo.png');
    }
}

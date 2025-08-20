<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
    ];

    // Fixed: Added public keyword
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function desginations(){
        return $this->throughDepartment->hasDesignation();
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/default-company-logo.png');
    }

    /**
     * Get the company's initials
     */
    public function initials(): string
    {
        $words = explode(' ', $this->name);
        $initials = '';
        
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        
        return $initials;
    }
}
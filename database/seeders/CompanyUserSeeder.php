<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the test user
        $user = User::where('email', 'admin@example.com')->first();
        
        if ($user) {
            // Get the first 3 companies
            $companies = Company::take(3)->pluck('id');
            
            // Attach companies to user
            $user->companies()->attach($companies);
            
            echo "Attached " . $companies->count() . " companies to user: " . $user->email . "\n";
        } else {
            echo "User not found. Make sure to run the users migration first.\n";
        }
    }
}
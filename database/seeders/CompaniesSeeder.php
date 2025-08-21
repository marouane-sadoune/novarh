<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'Google',
                'email' => 'contact@gmail.com',
                'address' => '1600 Amphitheatre Parkway, Mountain View, CA',
            ],
            [
                'name' => 'Microsoft',
                'email' => 'contact@microsoft.com',
                'address' => 'One Microsoft Way, Redmond, WA',
            ],
            [
                'name' => 'Adobe',
                'email' => 'contact@adobe.com',
                'address' => '345 Park Avenue, San Jose, CA',
            ],
            [
                'name' => 'Salesforce',
                'email' => 'contact@salesforce.com',
                'address' => 'Salesforce Tower, San Francisco, CA',
            ],
            [
                'name' => 'IBM',
                'email' => 'contact@ibm.com',
                'address' => '1 New Orchard Road, Armonk, NY',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
        
        echo "Created " . count($companies) . " companies successfully!\n";
    }
}
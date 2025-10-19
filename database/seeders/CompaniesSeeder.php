<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'website' => 'https://www.google.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Microsoft',
                'email' => 'contact@microsoft.com',
                'website' => 'https://www.microsoft.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adobe',
                'email' => 'contact@adobe.com',
                'website' => 'https://www.adobe.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salesforce',
                'email' => 'contact@salesforce.com',
                'website' => 'https://www.salesforce.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IBM',
                'email' => 'contact@ibm.com',
                'website' => 'https://www.ibm.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('companies')->insert($companies);

        foreach (Company::all() as $company) {
            $company->users()->attach(1); // Attach user with id 1
        }
    }
}

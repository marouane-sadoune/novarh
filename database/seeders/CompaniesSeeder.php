<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
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
                'email' => 'contact#adobe.com',
                'website' => 'https://www.adobe.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salesforce',
                'email' => 'contact#salesforce.com',
                'website' => 'https://www.salesforce.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IBM',
                'email' => 'contact#ibm.com',
                'website' => 'https://www.ibm.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oracle',
                'email' => 'contact#oracle.com',
                'website' => 'https://www.oracle.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Intel',
                'email' => 'contact#intel.com',
                'website' => 'https://www.intel.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Samsung',
                'email' => 'contact@samsung',
                'website' => 'https://www.samsung.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nvidia',
                'email' => 'contact@gmail.com',
                'website' => 'https://www.nvidia.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}

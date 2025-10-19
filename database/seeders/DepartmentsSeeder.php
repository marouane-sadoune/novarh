<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            $departments = $company->departments()->createMany([
                [
                    'name' => 'Engineering', 
                ],
                [
                    'name' => 'Human Resources',
                ],
                [
                    'name' => 'Finance',
                ],
                [
                    'name' => 'Marketing', 
                ],
            ]);
        
        foreach ($departments as $department)
        {
            switch ($department->name) {
                case 'Engineering':
                    $designations = [
                        'Software Engineer', 
                        'Senior Software Engineer', 
                        'Engineer Manager',
                        'Director of Engineering',
                    ];
                    break;
                case 'Human Resources':
                    $designations = [
                        'HR Assistant',
                        'HR Manager',
                        'Recruiter',
                        'HR Director',
                    ];
                    break;
                case 'Finance':
                    $designations = [
                        'Accountant',
                        'Financial Analyst',
                        'Finance Manager',
                        'Chief Financial Officer',
                    ];
                    break;
                case 'Marketing':
                    $designations = [
                        'Marketing Coordinator',
                        'Marketing Manager',
                        'Content Strategist',
                        'Director of Marketing',
                    ];
                    break;
                default:
                    $designations = [];
                    break;
            }
            foreach ($designations as $designation) {
                $department->designations()->create([
                    'name' => $designation,
                ]);
            }    
        }
    }
    }
}

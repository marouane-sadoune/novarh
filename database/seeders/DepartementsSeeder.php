<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Switch_;

class DepartementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();

        foreach ($companies as $company) {
            $departements = $company->departments()->createMany( [
                ['name' => 'Human Resources' ],
                ['name' => 'Finance'],
                ['name' => 'Engineering'],
                ['name' => 'Marketing'],
                
            ]);
            foreach ($departements as $departement) {
                Switch ($departement->name) {
                    case 'Engineering':
                        $designation = [
                            ['Software Engineer'],
                            ['Senoir Software Engineer'],
                            ['Engineering Manager'],
                            ['System Administrator'],
                            ['Network Engineer'],
                            ['Database Administrator'],
                            ['Derictor of Engineering'],
                            
                        ];
                        break;
                    case 'Human Resources':
                        $designation = [
                            ['HR Manager'],
                            ['HR Coordinator'],
                            ['HR Assistant'],
                            ['VP of HR'],
                        ];
                        
                        break;
                    case 'Finance':
                        $designation = [
                            ['Accountant'],
                            ['Senior Accountant'],
                            ['Finance Manager'],
                            ['Chief Financial Officer'],
                            
                        ];
                        
                        break;
                    case 'Marketing':
                        $designation = [
                            ['Marketing Manager'],
                            ['Marketing Strategist'],
                            ['Derictor of Marketing'],
                            ['VP of Marketing'],
                        ];  
                        
                        break;
                    default:
                        $designation = [];
                        break;
                }
            }
        }
    }
}

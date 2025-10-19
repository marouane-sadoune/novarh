<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class ContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Employee::all() as $key => $employee) {
            $employee->contracts()->create([
                
                    'designation_id' => $employee->designation_id,
                    'rate_type' => 'monthly',
                    'start_date' => now(),
                    'end_date' => now()->addYear(),
                    'rate' => 50000,
                
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractSeesder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Employee::all() as $key => $employee) {
            $employee->contracts()->create([
                'desgnation_id' => $employee->designation_id,
                'rate_type' => 'monthly',
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'salary' => 50000,
                'status' => 'active',
            ]);
        }
    }
}

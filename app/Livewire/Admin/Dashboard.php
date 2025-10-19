<?php
namespace App\Livewire\Admin;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Payment;
use Livewire\Component;

class Dashboard extends Component
{
    public $companiesCount;
    public $employeesCount;
    public $payrollsCount;
    public $paymentsCount;


public $stats = [];
public $data = []; 

public function mount()
{
    $this->stats = [
        [
            'title' => 'Companies',
            'value' => Company::count(),
            'trend' => '+2%', // Example trend
            'trendUp' => true,
        ],
        [
            'title' => 'Employees',
            'value' => Employee::count(),
            'trend' => '+5%',
            'trendUp' => true,
        ],
        [
            'title' => 'Payrolls',
            'value' => '200 670 MAD',
            'trend' => '+6%',
            'trendUp' => true,
        ],
        [
            'title' => 'Payments',
            'value' => '20 000 MAD',
            'trend' => '+3%',
            'trendUp' => true,
        ],
    ];
     $this->data = collect(range(6, 0))->map(function ($day) {
            $date = now()->subDays($day);
            return [
                'date' => $date->toDateString(),
                'payments' => Payment::whereDate('created_at', $date)->sum('amount'),
                'yesterday' => Payment::whereDate('created_at', $date->copy()->subDay())->sum('amount'),
            ];
        });
}


    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
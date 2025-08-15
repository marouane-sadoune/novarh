<?php

namespace App\Livewire\Admin\Payrolls;

use App\Models\Payroll;
use App\Models\Salary;
use Livewire\Component;

class Show extends Component
{
    public $payroll;
    public function mount($id)
    {
        $this->payroll = Payroll::findOrFail($id);
    }
    public function genratePayslips($id)
    {
        $salaries = Salary::find($id);
    }
    public function render()
    {
        return view('livewire.admin.payrolls.show');
    }
}

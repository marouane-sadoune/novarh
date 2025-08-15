<?php

namespace App\Livewire\Admin\Payments;

use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    use \Livewire\Features\SupportPagination\WithoutUrlPagination;

    public function rules()
    {
        return [
            // Define your validation rules here
            'monthYear' => 'required|date_format:Y-m',
        ];
    }
    public function generateReport()
    {
        $this->validate();
        $date = \Carbon\Carbon::prase( $this->monthYear);
        if (Payroll::inCompany()->where('month', $date->format('m'))->where('year',$date->format('Y')->exists()))  {
            throw new ValidationException(['month'=> 'Payroll for this month already exists.']);
        }else{
            $payroll = new Payroll();
            $payroll->month = $date->format('m');
            $payroll->year = $date->format('Y');
            $payroll->company_id = session('company_id');
            $payroll->save();
            foreach (Employee::inCompany()->get() as $employee) {
                $contract = $employee->getActiveContract($date->startOfMonth()->toDateString,$date->endOfMonth()->toDateString());
                if ($contract) {
                    $payroll->salaries()->create([
                        'employee_id' => $employee->id,
                        'gross_salary' => $contract->getTotalEarnings($date->format('Y-m')),
                    ]);
            }
        }
        session()->flash('success', 'Payroll generated successfully for ');
        }
    }
    public function updatePayroll($id)
    {
        $payroll = Payroll::find($id);
        $payroll->salaries()->delete();
        foreach (Employee::inCompany()->get() as $employee) {
            $contract = $employee->getActiveContract($payroll->month, $payroll->year);
            if ($contract) {
                $payroll->salaries()->create([
                    'employee_id' => $employee->id,
                    'gross_salary' => $contract->getTotalEarnings($payroll->month, $payroll->year),
                ]);
            }
        }
        session()->flash('success', 'Payroll updated successfully.');
    }
    public function render()
    {
        return view('livewire.admin.payments.index', [
            'payrolls' => Payroll::inCompany()->orderBy('year','desc')->orderBy('month','desc')->paginate(10),
        ]);
    }
}

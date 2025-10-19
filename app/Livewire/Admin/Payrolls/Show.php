<?php

namespace App\Livewire\Admin\Payrolls;

use App\Models\Payroll;
use App\Models\Salary;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Illuminate\Support\Str;

class Show extends Component
{
    public $payroll;
    public function mount($id)
    {
        $this->payroll = Payroll::InCompany()->find($id);
    }
    public function generatePayroll($id)
    {
        $salary = Salary::find($id);
        $pdf = Pdf::loadView('pdf.payroll', ['salary' => $salary]);
        $pdf->setPaper('A4', 'portrait');
        $filepath = storage_path(path: Str::slug(title: $salary->employee->name). '-payslip.pdf');
        $pdf->save($filepath);
        return response()->download(file: $filepath)->deleteFileAfterSend(shouldDelete: true);;
    }
    public function render()
    {
        return view('livewire.admin.payrolls.show', [
            'payrolls' => Payroll::InCompany()->paginate(10),
        ]);
    }
}

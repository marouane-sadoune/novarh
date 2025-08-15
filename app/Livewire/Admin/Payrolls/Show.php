<?php

namespace App\Livewire\Admin\Payrolls;

use App\Models\Payroll;
use App\Models\Salary;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
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
        $salary = Salary::find($id);
        $pdf = FacadePdf::loadView('pdf.payslip', ['salary' => $salary]);
        $pdf->setPaper(array(0, 0, 612, 792), 'portrait');
        $filepath = 'payslips/' . $salary->employee->name . '-' . $this->payroll->month . '-' . $this->payroll->year . '.pdf';
        $pdf->save(storage_path('app/' . $filepath));
        return response()->download(storage_path('app/' . $filepath))->deleteFileAfterSend(true);

    }
    public function render()
    {
        return view('livewire.admin.payrolls.show');
    }
}

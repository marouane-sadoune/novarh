<?php

namespace App\Livewire\Admin\Payments;

use App\Models\Payroll;
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
        if (Payroll::inCompany()->where('month_year', $date->format('m')->where('year',$date(->format('Y')))->exists()) {
            throw new \Exception('Payroll already exists for this month and year.');
        }else{
            $payroll = mew Payroll();
            
        }
    }
    public function render()
    {
        return view('livewire.admin.payments.index');
    }
}

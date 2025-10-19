<?php

namespace App\Livewire\Admin\Payments;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.payments.index', [
        'payments' => \App\Models\Payment::with(['employee', 'payroll'])->latest()->paginate(10),
    ]);
    }
}

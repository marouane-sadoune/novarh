<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    
    public function render()
    {
        return view('livewire.admin.contracts.index',data: [
            'departments' => Department::inCompany()->paginate(10),
        ]);
    }
}

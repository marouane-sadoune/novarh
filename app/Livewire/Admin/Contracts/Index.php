<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function delete($id)
    {
        Department::find($id)->delete();
        session()->flash('success', 'Departement deleted successfully.');
    }
    public function render()
    {
        return view('livewire.admin.contracts.index',data: [
            'departments' => Department::inCompany()->paginate(10),
        ]);
    }
}

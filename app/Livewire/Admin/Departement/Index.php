<?php

namespace App\Livewire\Admin\Departement;

use App\Models\Department;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
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
        return view('livewire.admin.departement.index', [
            'departments' => Department::inCompany()->paginate(10),
        ]);
    }
}

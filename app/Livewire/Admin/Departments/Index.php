<?php

namespace App\Livewire\Admin\Departments;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function delete($id)
    {
        $department = \App\Models\Department::find($id);
        if ($department) {
            $department->delete();
            session()->flash('success', 'Department deleted successfully.');
        } else {
            session()->flash('error', 'Department not found.');
        }
    }
    public function render()
    {
        return view('livewire.admin.departments.index', [
            'departments' => Department::InCompany()->paginate(4),
        ]);
    }
}

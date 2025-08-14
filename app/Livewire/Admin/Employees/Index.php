<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination;
    use \Livewire\Features\SupportPagination\WithoutUrlPagination;
    public function delete($id)
    {
        // Assuming you have an Employee model
        Employee::find($id)->delete();
        session()->flash('success', 'Employee deleted successfully.');
    }
    public function render()
    {
    return view('livewire.admin.employees.index',
        [
            'employees' => Employee::latest()->paginate(10),
        ]);
    }
}

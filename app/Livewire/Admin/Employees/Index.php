<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    public function delete($id)
    {
        // Assuming you have an Employee model
        Employee::find($id)->delete();
        session()->flash('success', 'Employee deleted successfully.');
    }
    public function render()
    {
        return view('livewire.admin.employees.index');
    }
}

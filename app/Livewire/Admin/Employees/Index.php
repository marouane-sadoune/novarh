<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    use \Livewire\WithPagination, \Livewire\WithoutUrlPagination;
    public function delete($id)
    {
        $employee = \App\Models\Employee::find($id);
        if ($employee) {
            $employee->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Employee Deleted Successfully!']);
        } else {
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Something went wrong!']);
        }
    }
    public function render()
    {
        return view('livewire.admin.employees.index',
            [
                'employees' => Employee::with('designation.department')->paginate(10),
            ]
        );
    }
}

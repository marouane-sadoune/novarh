<?php

namespace App\Livewire\Admin\Employees;

use Livewire\Component;

class Create extends Component
{
    public $employee;
    public $department_id;
    public function rules()
    {
        return [
            'employee.name' => 'required|string|max:255',
            'employee.email' => 'required|email|unique:employees,email',
            'employee.phone' => 'nullable|string|max:20',
            'employee.address' => 'nullable|string|max:500',
            'employee.designation_id' => 'required|exists:designations,id',
        ];
    }
    public function mount()
    {
        $this->employee = new \App\Models\Employee();
    }
    public function save()
    {
        $this->validate();
        $this->employee->save();
        session()->flash('message', 'Employee created successfully.');
        return $this->redirectIntended(route('employees.index'));
    }
    public function render()
    {
        $designations = \App\Models\Designation::InCompany()->where('department_id', $this->department_id)->get();
        return view('livewire.admin.employees.create',[
            'designations' => $designations,
            'departments' => \App\Models\Department::InCompany()->get(),
        ]);
    }
}

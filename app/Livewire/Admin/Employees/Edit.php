<?php

namespace App\Livewire\Admin\Employees;

use App\Models\Department;
use App\Models\Designation;
use Livewire\Component;

class Edit extends Component
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
    public function mount($id)
    {
        $this->employee = \App\Models\Employee::find($id);
        $this->department_id = $this->employee->designation->department_id;
    }
    public function save()
    {
        $this->validate();
        $this->employee->save();
        session()->flash('success', 'Employee edited successfully.');
        return $this->redirectIntended(route('employees.index'),true);
    }
    public function render()
    {
        $designations = Designation::InCompany()->where('department_id', $this->department_id)->get();
        return view('livewire.admin.employees.edit',[
            'designations' => $designations,
            'departments' => Department::InCompany()->get(),
        ]);
        
    }
}

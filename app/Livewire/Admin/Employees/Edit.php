<?php

namespace App\Livewire\Admin\Employees;

use Livewire\Component;

class Edit extends Component
{
    public $employee;
    public $departments_id;
    public function rules()
    {
        return [
            'employee.name' => 'required|string|max:255',
            'employee.email' => 'required|email|max:255|unique:employees,email',
            'employee.phone' => 'nullable|string|max:15',
            'employee.address' => 'nullable|string|max:255',
            'employee.designation_id' => 'required|exists:designation,id',
        ];
    }
    public function mount($id)
    {
        $this->employee = \App\Models\Employee::find($id);
        // $this->departments_id = \App\Models\Department::pluck('id', 'name'); # Assuming you want to use this for a dropdown or similar
    }


    public function save()
    {
        $this->validate();

        // Save the employee
        $this->employee->company_id = session('company_id'); 
        $this->employee->save();

        session()->flash('success', 'Employee Edited successfully.');

        return $this-> redirectIntended('employees.index');
        // return redirect()->route('admin.employees.index'); # Uncomment if you want to use this instead
    }
    public function render()
    {
        $departments = \App\Models\Department::inCompany()->where('department_id', $this->departments_id->get());
        return view('livewire.admin.employees.edit',[
                'departments' => $departments,
                'departments'=> \App\Models\Department::inCompany()->get(),
            ]);
    }
}

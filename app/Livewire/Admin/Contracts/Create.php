<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Designation;
use App\Models\Employee;
use Livewire\Component;

class Create extends Component
{
   
    public $contract;
    public $search = '';
    public $department_id;

    public function rules()
    {
        return [
            'contract.employee_id' => 'required|exists:employees,id',
            'contract.department_id' => 'required|exists:departments,id',
            'contract.start_date' => 'required|date',
            'contract.end_date' => 'nullable|date|after:contract.start_date',
            'contract.rate_type' => 'required|',
            'contract.rate' => 'required|numeric',
        ];
    }
    public function mount()
    {
        $this->contract = new \App\Models\Contract();
    }
    public function selectEmployee($id)
    {
        $this->contract->employee_id = $id;
        $this->search  = $this->contract->employee->name;
    }
    public function save()
    {
        $this->validate();

        $this->contract->department_id = $this->department_id;

        $this->contract->save();

        session()->flash('success', 'Contract created successfully.');

        return redirect()->route('contracts.index');
    }
    public function render()
    {
        $employees = Employee::inCompany()->searchByName($this->search)->get();
        $departments = \App\Models\Department::inCompany()->get();
        $designations = $this->department_id ? Designation::find($this->department_id)->designations : collect();
        return view('livewire.admin.contracts.create', [
            'employees' => $employees,
            'departments' => $departments,
            'designations' => $designations,
        ]);
    }
}

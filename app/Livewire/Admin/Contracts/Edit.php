<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Edit extends Component
{
    public $contract;
    public $search = '';
    public $department_id;

    public function rules()
    {
        return [
            'contract.designation_id' => 'required',
            'contract.employee_id' => 'required',
            'contract.start_date' => 'required|date',
            'contract.end_date' => 'required|date',
            'contract.rate_type' => 'required',
            'contract.rate' => 'required|numeric',
        ];
    }
    public function mount($id)
    {
        $this->contract = Contract::find($id);
    }
    public function selectEmployee($id)
    {
        $this->contract->employee_id = $id;
        $this->search = $this->contract->employee->name;
        $this->department_id = $this->contract->designation->department_id;
    }
    public function save()
    {
        $this->validate();
        $activeContract = $this->contract->employee->getActiveContract($this->contract->start_date, $this->contract->end_date);
        if ($activeContract && $activeContract->id != $this->contract->id) {
            throw ValidationException::withMessages(['contract.start_date' => 'Employee already has Active Contract']);
        }
        $this->contract->save();
        session()->flash('success', 'Contract edited successfully');
        return $this->redirectIntended(route('contracts.index'));
    }
    public function render()
    {
        $employees = Employee::inCompany()->searchByName(name: $this->search)->get();
        $departments = Department::inCompany()->get();
        $designations = $this->department_id ? Department::find($this->department_id)->designations : collect();
        return view('livewire.admin.contracts.edit', [
            'employees' => $employees,
            'departments' => $departments,
            'designations' => $designations,
        ]);
    }
}

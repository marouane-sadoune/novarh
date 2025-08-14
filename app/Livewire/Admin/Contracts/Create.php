<?php

namespace App\Livewire\Admin\Contracts;

use Livewire\Component;

class Create extends Component
{
    public $department;

    public function rules()
    {
        return [
            'department.name' => 'required|string|max:255',
        ];
    } 
    public function mount()
    {
        $this->department = new \App\Models\Department();
    }
    public function save()
    {
        $this->validate();

        $this->department->save();

        session()->flash('success', 'Department created successfully.');

        return redirect()->route('admin.contracts.index');
    }

    public function render()
    {
        return view('livewire.admin.contracts.create');
    }
}

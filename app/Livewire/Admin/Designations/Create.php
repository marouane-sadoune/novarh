<?php

namespace App\Livewire\Admin\Designations;

use Livewire\Component;

class Create extends Component
{
    
    public $designation;
    public function rules()
    {
        return [
            'designation.name' => 'required|string|max:255',
            'designation.department_id' => 'required|exists:departments,id',
        ];
    }
    public function mount()
    {
        $this->designation = new \App\Models\Designation();
    }
    public function save()
    {
        $this->validate();
        // $this->designation->company_id = session('company_id');
        $this->designation->save();
        session()->flash('success', 'Designation created successfully.');
        return $this-> redirectIntended('designations.index');
        // return redirect()->route('admin.designations.index'); 
    }
    public function render()
    {
        return view('livewire.admin.designations.create');
    }
}

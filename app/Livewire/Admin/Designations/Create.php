<?php

namespace App\Livewire\Admin\Designations;

use App\Models\Designation;
use Livewire\Component;

class Create extends Component
{
    public $designation;
    public function mount()
    {
        $this->designation = new \App\Models\Designation();
    }
    public function rules()
    {
        return [
            'designation.name' => 'required|string|max:255' ,
            'designation.department_id' => 'required|exists:departments,id', 
        ];
    }
    public function save()
    {
        $this->validate();
        $this->designation->save();
        session()->flash('message', 'Designation created successfully.');
        return $this->redirectIntended(route('designations.index'),true);
    }
    public function render()
    {
        return view('livewire.admin.designations.create',
        [
            'departments' => \App\Models\Department::inCompany()->get()
        ]);
    }
}

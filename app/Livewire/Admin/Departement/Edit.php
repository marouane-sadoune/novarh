<?php

namespace App\Livewire\Admin\Departement;

use App\Models\Department;
use Livewire\Component;

class Edit extends Component
{
    public $department;

    public function rules()
    {
        return [
            'department.name' => 'required|string|max:255',
        ];
    } 
    public function mount($id)
    {
        $this->department = Department::find($id);
    }
    public function save()
    {
        $this->validate();

        $this->department->save();

        session()->flash('success', 'Department edited successfully.');

        return $this-> redirectIntended('departement.index');
    }
    public function render()
    {
        return view('livewire.admin.departement.edit');
    }
}

<?php

namespace App\Livewire\Admin\Designations;

use Livewire\Component;

class Edit extends Component
{
    public $designation;
    public function rules()
    {
        return [
            'designation.name' => 'required|string|max:255',
            'designation.department_id' => 'required|exists:departments,id',
        ];
    }
    public function mount($id)
    {
        $this->designation = \App\Models\Designation::find($id);
    }
    public function save()
    {
        $this->validate();

        // Save the designations
        $this->designation->save();

        session()->flash('success', 'Designation edited successfully.');

        return $this-> redirectIntended('designations.index');
        // return redirect()->route('admin.designations.index');
    }
    public function render()
    {
        return view('livewire.admin.designations.edit');
    }
}

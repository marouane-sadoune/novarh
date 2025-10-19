<?php

namespace App\Livewire\Admin\Designations;


use App\Models\Designation;
use Livewire\Component;

class Edit extends Component
{
    public $designation;
    public function rules()
    {
        return [
            'designation.name' => 'required|string|max:255' ,
            'designation.department_id' => 'required|exists:departments,id', 
        ];
    }
    public function mount($id)
    {
        $this->designation = Designation::find($id);
        if (!$this->designation) {
            return redirect()->route('designations.index');
        }
    }
    public function save()
    {
        $this->validate();
        $this->designation->save();
        session()->flash('message', 'Designation updated successfully.');
        return $this->redirectIntended(route('designations.index'),true);
    }
    public function render()
    {
        return view('livewire.admin.designations.edit');
    }
}

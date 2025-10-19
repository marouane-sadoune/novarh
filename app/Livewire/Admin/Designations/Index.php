<?php

namespace App\Livewire\Admin\Designations;

use App\Models\Designation;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function delete($id)
    {
        $designation = Designation::find($id);
        if ($designation) {
            $designation->delete();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Designation Deleted Successfully!']);
        } else {
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Something went wrong!']);
        }
    }
    public function render()
    {
        return view('livewire.admin.designations.index',
        [
            'designations' => Designation::inCompany()->paginate(8)
        ]);
    }
}

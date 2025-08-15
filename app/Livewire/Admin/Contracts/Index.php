<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination,WithoutUrlPagination;
    public $search = '';
    public function delete($id)
    {
        $department = Contract::find($id);
        $department->delete();
        session()->flash('success', 'Department deleted successfully.');
    }
    public function render()
    {
        return view('livewire.admin.contracts.index',data: [
            'departments' => Contract::inCompany()->searchByEmploye($this->search)->paginate(10),
        ]);
    }
}

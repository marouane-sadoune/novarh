<?php

namespace App\Livewire\Admin\Contracts;

use App\Models\Contract;

use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public function delete($id)
    {
        Contract::find($id)->delete();
        session()->flash('success', 'Contract deleted successfully');
    }
    public function scopeInCompany($query)
    {
        return $query->whereHas('designation', function ($q) {
            $q->inCompsny();
        });
    }
    public function getDurationAttribute()
    {
        return \Carbon\Carbon::parse($this->start_date)->diffForHumans($this->end_date);
    }
    public function scopeSearchByEmployee($query, $name)
    {
        return $query->whereHas('employee', function ($q) use ($name) {
            $q->where('name', 'like', '%' . $name . '%');
        });
    }
    public function getTotalEarnings($monthYear)
    {
        return $this->rate_type == 'monthly' ? $this->rate : $this->rate * Carbon:: parse($monthYear)->daysInMonth;
    }
    public function render()
    {
        $contracts = Contract::query()
            ->when($this->search, function ($query) {
            $query->searchByEmployee($this->search);
            })
            ->paginate(10);

        return view('livewire.admin.contracts.index', [
            'contracts' => $contracts,
        ]);
    }
}

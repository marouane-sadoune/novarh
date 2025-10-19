<?php

namespace App\Livewire\Admin\Companies;

use Illuminate\Support\Facades\Storage ;
use Livewire\Component;

class Edit extends Component
{
    public $company;
    public $logo;

    public function rules()
    {
        return [
            'company.name' => 'required|string|max:255',
            'company.email' => 'nullable|email|max:255',
            'company.website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mims:jpg,png,jpeg|max:2048', // 1MB Max
        ];
    }
    public function mount($id)
    {
        $this->company = \App\Models\Company::find($id);
    }
    public function save()
    {
        $this->validate();
        if ($this->company->logo) {
            Storage::disk('public')->delete($this->company->logo);
        }
        \App\Models\Company::create($this->company);
        session()->flash('seccess', 'Company Edited successfully.');
        return $this->redirectIntended(route('companies.index'),true);
    }
    public function render()
    {
        return view('livewire.admin.companies.edit');
    }
}

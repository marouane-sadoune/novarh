<?php

namespace App\Livewire\Admin\Companies;

use Livewire\Component;

class Create extends Component
{
    use \Livewire\WithFileUploads;
    public $company;
    public $logo;

    public function rules()
    {
        return [
            'company.name' => 'required|string|max:255',
            'company.website' => 'nullable|url|max:255',
            'company.email' => 'required|email|max:255',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // 2MB Max
        ];
    }
    public function mount()
    {
        $this->company = new \App\Models\Company();
    }
    public function save()
    {
        $this->validate();

        if ($this->logo) {
            $this->company->logo = $this->logo->store('logos', 'public');
        }

        $this->company->save();

        session()->flash('seccess', 'Company created successfully.');

        return redirect()->route('admin.companies.index');
    }
    public function render()
    {
        return view('livewire.admin.companies.create');
    }
}

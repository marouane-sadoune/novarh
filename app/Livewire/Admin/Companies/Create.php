<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $company;
    public $logo;
    use WithFileUploads;

    public function rules()
    {
        return [
            'company.name' => 'required|string|max:255',
            'company.email' => 'nullable|email|max:255',
            'company.website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
        ];
    }
    public function mount()
    {
        $this->company = new Company();
    }
    public function save()
    {
        $this->validate();
        $companyData = [
            'name' => $this->company->name,
            'email' => $this->company->email,
            'website' => $this->company->website,
        ];
        if ($this->logo) {
            $companyData['logo'] = $this->logo->store('logos', 'public');
        }
        \App\Models\Company::create($this->company);    
    
        session()->flash('success', 'Company created successfully.');
        return $this->redirectIntended(route('companies.index'),true);
    }
    public function render()
    {
        return view('livewire.admin.companies.create');
    }
}

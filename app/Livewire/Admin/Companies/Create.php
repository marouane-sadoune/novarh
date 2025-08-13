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
    public function render()
    {
        return view('livewire.admin.companies.create');
    }
}

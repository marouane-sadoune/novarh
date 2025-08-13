<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public function delete($companyId)
    {
        $company = Company::find($companyId);
        if ($company->exists) {
            $company->delete();
            session()->flash('message', 'Company deleted successfully.');
            if ($company->logo) {
                $company->logo->delete();
            }
        } else {
            session()->flash('error', 'Company not found.');
        }
    }
    public function render()
    {
        return view('livewire.admin.companies.index');
    }
}

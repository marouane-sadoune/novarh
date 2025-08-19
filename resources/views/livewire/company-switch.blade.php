<?php

use Illuminate\Support\Facades\URL;
use Livewire\Volt\Component;

new class extends Component {
    public $company;

    public function mount($company)
    {
        $this->company = $company;
    }

    public function selectCompany()
    {
        session(['company_id' => $this->company->id]);
        return $this->redirectIntended(URL::previous());
    }
}; ?>

<div>
    <flux:menu.item wire:click="selectCompany" class="flex items-center gap-2">
        <x-heroicon-o-building-office-2 class="w-5 h-5 text-gray-500" />
        <span class="text-sm font-medium text-gray-700">{{ $company->name }}</span>
    </flux:menu.item>
</div>

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
            return $this->redirectIntended(URL::previous(),true);
        }
    }; ?>

    <div>
        <flux:menu.item wire:click="selectCompany">{{ $company->name }}</flux:menu.item>
    </div>

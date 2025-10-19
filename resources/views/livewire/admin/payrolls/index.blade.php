<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Payrolls</flux:heading>
        <flux:subheading size="1g" class="mb-6">Payrolls for {{ getCompany()->name }}</flux:subheading>
        <flux:separator/>
    </div>

    <div class="flex justify-between items-center">
        <div class="w-full pr-4">
            <flux:input type="month" name="month" wire:model="monthYear" placeholder="Month for Employee" :invalid="$errors->has('monthYear')" />
        </div>
        <div>
            <flux:button variant="primary" wire:click="generatePayroll">Generate Payroll</flux:button>
        </div>
    </div>

    <div class="flex flex-row flex-wrap gap-4 mt-6">
        @foreach ($payrolls as $payroll)
            <div class="min-w-[250px] max-w-xs flex-1 p-6 bg-zinc-50 dark:bg-zinc-700 text-zinc-900 dark:text-white rounded-lg shadow-md hover:shadow-lg dark:hover:bg-zinc-500 hover:bg-zinc-200 transition duration-300 ease-in-out" wire:click="viewPayroll({{ $payroll->id }})">
                <div class="mb-4">
                    <h2 class="text-lg font-semibold">
                        {{ $payroll->month_string }}
                    </h2>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">
                        {{ getCompany()->name }}
                    </p>
                </div>
                <div class="flex flex-col items-end text-right justify-end">
                <sup>MAD</sup>
                <span class="font-bold text-xl">
                    650000
                </span>
            </div>
            </div>
        @endforeach
    </div>
</div>

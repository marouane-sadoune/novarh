<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Contracts</flux:heading>
        <flux:subheading size="1g" class="mb-6">Create a new Contract</flux:subheading>
        <flux:separator/>
    </div>
        <form wire:submit="save" class="my-6 w-full space-y-6">     
            <flux:input 
                type="search" name="search" wire:model.live="search" placeholder="Search for an Employee" />

            @if ($search != '' && $employees->count() > 0)
                <div class="w-full bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-500 rounded-md shadow-md mt-1 max-h-60 overflow-y-auto">
                    <ul class="w-full">
                        @foreach ($employees as $employee)
                            <li 
                                class="p-2 hover:bg-zinc-200 dark:hover:bg-zinc-700 cursor-pointer"
                                wire:click="selectEmployee({{ $employee->id }})">
                                {{ $employee->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <flux:error name="contract.employee_id" />
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 gap-6">
                <div>
                    <flux:select name="department" label="Department" wire:model.live="department_id">
                        <option value="">Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </flux:select>
                </div>
                <flux:error name="contract.designation_id" />
                <div>
                    <flux:select name="designation" label="Designation" wire:model.live="contract.designation_id">
                        <option value="">Select Designation</option>
                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                        @endforeach
                    </flux:select>
                </div>
                <flux:error name="contract.designation_id" />
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 gap-6">
                <div>
                    <flux:input type="date" name="start_date" label="Start Date" wire:model="contract.start_date" />
                </div>
                <flux:error name="contract.start_date" />
                <div>
                    <flux:input type="date" name="end_date" label="End date" wire:model="contract.end_date" />
                </div>
                <flux:error name="contract.end_date" />
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 gap-6">
                <div>
                    <flux:input type="number" name="rate" label="Rate" wire:model.Live="contract.rate" />
                </div>
                <flux:error name="contract.rate" />
                <div>
                    <flux:select name="rate_type" label="Rate Type" wire:model.Live="contract.rate_type">
                    <option selected>Select Rate Type</option>
                    <option value="daily">Daily</option>
                    <option value="monthly">Monthly</option>
                </flux:select>
                </div>
                <flux:error name="contract.rate_type" />
            </div>
            <div>
                <flux:button type="submit" variant="primary">Save</flux:button> 
            </div>
        </form>
</div>

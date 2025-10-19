<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Employees</flux:heading>
        <flux:subheading size="1g" class="mb-6">Edit this Employee</flux:subheading>
        <flux:separator/>
    </div>
        <form wire:submit="save" class="my-6 w-full space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 gap-6">
            <flux:input label="Employee Name" wire:model.live="employee.name" placeholder="Enter Employee Name" :invalid="$errors->has('employee.name')" type="text"/>
            <flux:input label="Employee Email" wire:model.live="employee.email" placeholder="Enter Employee Email" :invalid="$errors->has('employee.email')" type="email"/>
            <!-- Department Select -->
            <div class="w-full">
                <flux:select 
                    label="Select Department" 
                    wire:model.live="department_id" 
                    :invalid="$errors->has('department_id')"
                    class="w-full">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </flux:select>                                
            </div>

            <!-- Designation Select -->
            <div class="w-full">
                <flux:select 
                    label="Select Designation" 
                    wire:model.live="employee.designation_id" 
                    :invalid="$errors->has('employee.designation_id')"
                    class="w-full">
                        
                    @foreach ($designations as $designation)
                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                    @endforeach
                </flux:select>
                
               
            </div>
            <flux:input label="Employee Phone" wire:model.live="employee.phone" placeholder="Enter Employee Phone" :invalid="$errors->has('employee.phone')" type="text"/>
            <flux:input label="Employee Address" wire:model.live="employee.address" placeholder="Enter Employee Address" :invalid="$errors->has('employee.address')" type="text"/>
        </div>
            <flux:button type="submit" variant="primary">Save</flux:button> 
        </form>
</div>
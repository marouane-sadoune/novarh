<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Designations</flux:heading>
        <flux:subheading size="1g" class="mb-6">Create a new Designation</flux:subheading>
        <flux:separator/>
    </div>
        <form wire:submit="save" class="my-6 w-full space-y-6">
            <flux:select 
                label="Select Department" 
                wire:model.live="designation.department_id" 
                :invalid="$errors->has('designation.department_id')">
                
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </flux:select>
            <flux:input label="Designation Name" wire:model.live="designation.name" placeholder="Enter Designation Name" :invalid="$errors->has('designation.name')" type="text"/>
            <flux:button type="submit" variant="primary">Save</flux:button> 
        </form>
</div>
<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Designations</flux:heading>
        <flux:subheading size="1g" class="mb-6">Edit this Designation</flux:subheading>
        <flux:separator/>
    </div>
        <form wire:submit="save" class="my-6 w-full space-y-6">
            <flux:input label="Department Name" wire:model.live="department.name" placeholder="Enter Department Name" :invalid="$errors->has('department.name')" type="text"/>
            
            <flux:input label="Designation Name" wire:model.live="designation.name" placeholder="Enter Designation Name" :invalid="$errors->has('designation.name')" type="text"/>
            <flux:button type="submit" variant="primary">Save</flux:button> 
        </form>
</div>


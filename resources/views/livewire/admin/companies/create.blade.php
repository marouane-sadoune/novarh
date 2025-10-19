<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Companies</flux:heading>
        <flux:subheading size="1g" class="mb-6">Create a new Company</flux:subheading>
        <flux:separator/>
    </div>
        <form wire:submit="save" class="my-6 w-full space-y-6">
            <flux:input label="Company Name" wire:model.live="company.name" placeholder="Enter Company Name" :invalid="$errors->has('company.name')" type="text"/>
            <flux:input label="Company Email" wire:model.live="company.email" placeholder="Enter Company Email" :invalid="$errors->has('company.email')" type="email"/>
            <flux:input label="Company Website" wire:model.live="company.website" placeholder="Enter Company Website" :invalid="$errors->has('company.website')" type="url"/>
            <flux:input label="Company Logo" wire:model.live="logo" :invalid="$errors->has('logo')" type="file"/>
            <flux:button type="submit" variant="primary">Save</flux:button> 
        </form>
</div>

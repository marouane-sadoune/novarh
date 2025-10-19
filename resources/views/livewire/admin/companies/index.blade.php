<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Companies</flux:heading>
        <flux:subheading size="1g" class="mb-6">List of Companies</flux:subheading>
        <flux:separator/>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow-2xl rounded-lg overflow-hidden w-full border border-gray-100 dark:border-gray-800">
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <table class="w-full table-auto text-center text-sm text-gray-500 dark:bg-dark">
                        <thead class="bg-zinc-200 dark:bg-zinc-200">
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Company Name
                                </th>
                                <th>
                                    Number of Employees
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr class="bg-white border-b dark:bg-zinc-900 dark:border-zinc-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $company->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm flex justify-left items-center text-gray-500 dark:text-white font-medium">
                                        <img src="{{ $company->logo_url }}" alt="" class="w-10 h-10 rounded-full mr-4">
                                        <span>{{ $company->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                        {{ $company->departments->flatMap->designations->flatMap->employees->count() }}
                                    </td>
                                    <td>
                                        <flux:button variant="filled" icon="pencil" :href="route('companies.edit', $company->id)" size="sm">
                                            Edit
                                        </flux:button>
                                        <flux:button variant="danger" icon="trash" color="red" size="sm" wire:click="delete({{ $company->id }})">
                                            Delete
                                        </flux:button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-2 px-2 bg-gray-50 dark:bg-zinc-800">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

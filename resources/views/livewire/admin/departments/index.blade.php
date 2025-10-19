<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Departments</flux:heading>
        <flux:subheading size="1g" class="mb-6">List of Departments for {{ getCompany()->name }}</flux:subheading>
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
                                    Department Name
                                </th>
                                <th>
                                    Number of Designations
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
                            @foreach ($departments as $key => $department)
                                <tr class="bg-white border-b dark:bg-zinc-900 dark:border-zinc-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white font-medium">
                                        {{ $department->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                        {{ $department->designations->count() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                        {{ $department->designations->flatMap->employees->count() }}
                                    </td>
                                    <td>
                                        <flux:button variant="filled" icon="pencil" :href="route('departments.edit', $department->id)" size="sm">
                                            Edit
                                        </flux:button>
                                        <flux:button variant="danger" icon="trash" color="red" size="sm" wire:click="delete({{ $department->id }})">
                                            Delete
                                        </flux:button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-2 px-2 bg-gray-50 dark:bg-zinc-800">
                        {{ $departments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

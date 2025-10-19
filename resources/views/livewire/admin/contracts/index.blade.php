<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Contracts</flux:heading>
        <flux:subheading size="1g" class="mb-6">List of Contracts for {{ getCompany()->name }}</flux:subheading>
        <flux:separator/>
    </div>
    <div class="bg-white dark:bg-gray-900 shadow-2xl rounded-lg overflow-hidden w-full border border-gray-100 dark:border-gray-800">
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <table class="w-full table-auto text-center text-sm text-gray-500 dark:colora2">
                        <thead class="bg-zinc-200 dark:bg-zinc-200">
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Employee Details
                                </th>
                                <th>
                                    Contract Details
                                </th>
                                <th>
                                    Rate
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $key => $contract)
                                <tr class="bg-white border-b dark:bg-zinc-900 dark:border-zinc-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-white font-medium text-center">
                                        <div class="space-y-1">
                                            <div class="font-semibold">{{ $contract->employee->name }}</div>
                                            <div class="text-xs opacity-75">{{ $contract->employee->email }}</div>
                                            <div class="text-xs opacity-75">{{ $contract->employee->phone }}</div>
                                            <div class="text-xs font-medium text-blue-600 dark:text-blue-400">
                                                {{ $contract->employee->designation->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-center">
                                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-3 inline-block">
                                            <div class="space-y-2">
                                                <div class="flex items-center justify-center space-x-2 text-xs">
                                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                                    <span class="text-gray-600 dark:text-gray-300">{{ $contract->start_date }}</span>
                                                </div>
                                                <div class="border-l-2 border-dashed border-gray-300 dark:border-gray-600 h-4 ml-1"></div>
                                                <div class="flex items-center justify-center space-x-2 text-xs">
                                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                                    <span class="text-gray-600 dark:text-gray-300">{{ $contract->end_date }}</span>
                                                </div>
                                                <div class="text-xs font-medium text-blue-600 dark:text-blue-400 mt-2 pt-1 border-t border-gray-200 dark:border-gray-700">
                                                    {{ $contract->duration }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-center">
                                        <div class="space-y-1">
                                            <div class="text-xl font-bold text-gray-900 dark:text-white">
                                                {{ number_format($contract->rate) }} MAD
                                            </div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">
                                                {{ $contract->rate_type }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <flux:button variant="filled" icon="pencil" :href="route('contracts.edit', $contract->id)" size="sm">
                                            Edit
                                        </flux:button>
                                        <flux:button variant="danger" icon="trash" color="red" size="sm" wire:click="delete({{ $contract->id }})">
                                            Delete
                                        </flux:button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-2 px-2 bg-gray-50 dark:bg-zinc-800">
                        {{ $contracts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

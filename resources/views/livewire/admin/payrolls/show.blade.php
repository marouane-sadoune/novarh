<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">Payrolls</flux:heading>
        <flux:subheading size="1g" class="mb-6">Payrolls Breakdown for {{ getCompany()->name }} during {{ $payroll->month_string }}</flux:subheading>
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
                                <th>Employee Details</th>
                                <th>Gross Salary</th>
                                <th>NSSF</th>
                                <th>SHIF</th>
                                <th>AHL</th>
                                <th>PAYE</th>
                                <th>Net Pay</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payroll->salaries as $key=>$salary)
                                <tr class="bg-white border-b dark:bg-zinc-900 dark:border-zinc-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-white font-medium">
                                        {{ $slary->employee->name }}
                                        {{ $slary->employee->designation->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                         MAD {{ number_format($salary->gross_salary,2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                         MAD {{ number_format($salary->breakdown->getNssfDeduction(),2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                         MAD {{ number_format($salary->breakdown->getShifDeduction(),2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                         MAD {{ number_format($salary->breakdown->getAhlDeduction(),2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                         MAD {{ number_format($salary->breakdown->getPaye(),2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium dark:text-white">
                                         MAD {{ number_format($salary->breakdown->getNetPay(),2) }}
                                    </td>                                    
                                    <td>
                                        <flux:button variant="filled" icon="document" wire:click="generatePayslip({{ $salary->id }})" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

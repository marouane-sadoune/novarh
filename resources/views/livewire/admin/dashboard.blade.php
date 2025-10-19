<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="x1">
            Dashboard
        </flux:heading>
        <flux:subheading size="1g" class="mb-6">
            Welcome {{ auth()->user()->name }}
        </flux:subheading>
        <flux:separator/>
    </div>
    
    <div class="flex gap-6 mb-6">
        @foreach ($this->stats as $stat)
            <div class="min-w-[250px] max-w-xs flex-1 p-6 rounded-lg bg-zinc-50 dark:bg-zinc-700 {{ $loop->iteration > 1 ? 'max-md:hidden' : '' }} {{ $loop->iteration > 3 ? 'max-lg:hidden' : '' }}">
                <flux:subheading>{{ $stat['title'] }}</flux:subheading>
                <flux:heading size="xl" class="mb-2 tabular-nums">{{ $stat['value'] }}</flux:heading>
                <div class="flex items-center gap-1 font-medium text-sm @if ($stat['trendUp']) text-green-600 dark:text-green-400 @else text-red-500 dark:text-red-400 @endif">
                    <flux:icon :icon="$stat['trendUp'] ? 'arrow-trending-up' : 'arrow-trending-down'" variant="micro" /> {{ $stat['trend'] }}
                </div>
                <div class="absolute top-0 right-0 pr-2 pt-2">
                    <flux:button icon="ellipsis-horizontal" variant="subtle" size="sm" />
                </div>
            </div>
        @endforeach
    </div>

    <!-- Chart Section -->
        
</div>



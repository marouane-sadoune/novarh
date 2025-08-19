<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group :heading="__('Companies')" class="grid">
                    <flux:navlist.item icon="building-office-2" :href="route('companies.index')" :current="request()->routeIs('companies.*')" wire:navigate>{{ __('Companies') }}</flux:navlist.item>
                    <flux:navlist.item icon="plus" :href="route('companies.create')" :current="request()->routeIs('companies.create')" wire:navigate>{{ __('Create a New Company') }}</flux:navlist.item>

                </flux:navlist.group>
                  {{-- <flux:navlist.group :heading="__('Departments')" class="grid">
                    <flux:navlist.item icon="building-office-2" :href="route('departements.index')" :current="request()->routeIs('departments.*')" wire:navigate>{{ __('Departments') }}</flux:navlist.item>
                    <flux:navlist.item icon="plus" :href="route('departements.create')" :current="request()->routeIs('departments.create')" wire:navigate>{{ __('Create a New Department') }}</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group :heading="__('Designations')" class="grid">
                    <flux:navlist.item icon="briefcase" :href="route('designations.index')" :current="request()->routeIs('designations.*')" wire:navigate>{{ __('Designations') }}</flux:navlist.item>
                    <flux:navlist.item icon="plus" :href="route('designations.create')" :current="request()->routeIs('designations.create')" wire:navigate>{{ __('Create a New Designation') }}</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group :heading="__('Employees')" class="grid">
                    <flux:navlist.item icon="users" :href="route('employees.index')" :current="request()->routeIs('employees.*')" wire:navigate>{{ __('Employees') }}</flux:navlist.item>
                    <flux:navlist.item icon="plus" :href="route('employees.create')" :current="request()->routeIs('employees.create')" wire:navigate>{{ __('Create a New Employee') }}</flux:navlist.item>
                     <flux:navlist.item icon="users" :href="route('employees.index')" :current="request()->routeIs('employees.*')" wire:navigate>{{ __('Employees') }}</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group :heading="__('Contracts')" class="grid">
                    <flux:navlist.item icon="users" :href="route('contracts.index')" :current="request()->routeIs('contracts.*')" wire:navigate>{{ __('Contracts') }}</flux:navlist.item>
                    <flux:navlist.item icon="plus" :href="route('contracts.create')" :current="request()->routeIs('contracts.create')" wire:navigate>{{ __('Create a New Contract') }}</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group :heading="__('Payroll')" class="grid">
                    <flux:navlist.item icon="users" :href="route('payroll.index')" :current="request()->routeIs('payroll.*')" wire:navigate>{{ __('Payroll') }}</flux:navlist.item>
                    <flux:navlist.item icon="plus" :href="route('payroll.create')" :current="request()->routeIs('payroll.create')" wire:navigate>{{ __('Create a New Payroll') }}</flux:navlist.item>
                </flux:navlist.group>  --}}
            </flux:navlist>

            <flux:spacer/>

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>

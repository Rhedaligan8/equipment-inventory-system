<div class="flex h-full bg-base-300" x-data="{activeTab: 'users'}">
    <livewire:sidebar />
    <div class="grow flex flex-col">
        <livewire:header />
        <div class="m-6 bg-base-100 grow border-2 border-neutral/25 rounded-md p-4 shadow-md overflow-hidden">
            <!-- equipments tab -->
            <section class="h-full" x-cloak x-show="activeTab == 'equipments'">
                <livewire:equipments />
            </section>

            <!-- equipments types tab -->
            <section class="h-full" x-cloak x-show="activeTab == 'equipment_types'">
                <livewire:equipment-types />
            </section>

            <!-- locations tab -->
            <section class="h-full" x-cloak x-show="activeTab == 'locations'">
                <livewire:locations />
            </section>

            @if(Auth::user()->role === 1)
                <!-- users tab -->
                <section class="h-full" x-cloak x-show="activeTab == 'users'">
                    <div x-data="{activeTab: 'userTable'}" class="h-full">
                        <section x-cloak x-show="activeTab == 'userTable'" class="h-full">
                            <livewire:users />
                        </section>
                        <section x-cloak x-show="activeTab == 'createUser'" class="h-full">
                            <livewire:create-user />
                        </section>
                    </div>
                </section>

                <!-- logs tab -->
                <section class="h-full " x-cloak x-show="activeTab == 'logs'">
                    <livewire:logs />
                </section>
            @endif

            <!-- account tab -->
            <section class="h-full" x-cloak x-show="activeTab == 'account'">
                <livewire:account />
            </section>
        </div>
    </div>
</div>
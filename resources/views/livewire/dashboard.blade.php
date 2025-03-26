<div class="flex h-full bg-base-300" x-data="{activeTab: 'equipments'}">
    <livewire:sidebar />
    <div class="grow flex flex-col">
        <livewire:header />
        <div class="m-6 bg-base-100 grow border-2 border-neutral/25 rounded-md p-4 shadow-md overflow-hidden">
            <!-- equipments tab -->
            <section class="h-full" x-cloak x-show="activeTab == 'equipments'">
                <div x-data="{activeTab: 'equipments'}" class="h-full">
                    <section x-cloak x-show="activeTab == 'equipments'" class="h-full">
                        <livewire:equipments />
                    </section>
                    <section x-cloak x-show="activeTab == 'preventiveMaintenance'" class="h-full">
                        <livewire:preventive-maintenance />
                    </section>
                    <section x-cloak x-show="activeTab == 'addEquipment'" class="h-full">
                        <livewire:add-equipment />
                    </section>
                    <section x-cloak x-show="activeTab == 'editEquipment'" class="h-full">
                        <livewire:edit-equipment />
                    </section>
                </div>
            </section>

            <!-- equipments types tab -->
            <section class="h-full" x-cloak x-show="activeTab == 'equipment_types'">
                <div x-data="{activeTab: 'equipmentTypesTable'}" class="h-full">
                    <section x-cloak x-show="activeTab == 'equipmentTypesTable'" class="h-full">
                        <livewire:equipment-types />
                    </section>
                    <section x-cloak x-show="activeTab == 'addEquipmentType'" class="h-full">
                        <livewire:add-equipment-type />
                    </section>
                    <section x-cloak x-show="activeTab == 'editEquipmentType'" class="h-full">
                        <livewire:edit-equipment-type />
                    </section>
                </div>
            </section>

            <!-- locations tab -->
            <section class="h-full" x-cloak x-show="activeTab == 'locations'">
                <div x-data="{activeTab: 'locationsTable'}" class="h-full">
                    <section x-cloak x-show="activeTab == 'locationsTable'" class="h-full">
                        <livewire:locations />
                    </section>
                    <section x-cloak x-show="activeTab == 'addLocation'" class="h-full">
                        <livewire:add-location />
                    </section>
                    <section x-cloak x-show="activeTab == 'editLocation'" class="h-full">
                        <livewire:edit-location />
                    </section>
                </div>
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
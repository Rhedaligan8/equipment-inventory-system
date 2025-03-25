<div class="h-full">
    <div class="overflow-x-auto flex flex-col h-full">
        <button x-on:click="activeTab = 'addEquipmentType'" class="btn btn-sm btn-primary text-base-100 self-end mb-2">
            <i class="bi bi-pc-display"></i>
            ADD EQUIPMENT</button>
        <!-- header -->
        <div class="mb-4 flex justify-between">
            <div class="flex gap-1 items-center">
                <select wire:model.debounce.500ms="perPage"
                    class="select select-sm w-20 focus:ring-0 focus:outline-none shrink-0">
                    <option value={{ 10 }}>10</option>
                    <option value={{ 20 }}>20</option>
                    <option value={{ 30 }}>30</option>
                    <option value={{ 40 }}>40</option>
                    <option value={{ 50 }}>50</option>
                </select>
                <input wire:model.debounce.500ms="name" type="search" placeholder="Search equipment type"
                    class="input focus:ring-0 focus:outline-none input-sm shrink-0 max-w-60 w-60" />
                <div wire:loading class="ml-2"><span class="loading loading-spinner loading-sm"></span>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" @class(['btn m-1 btn-sm font-bold', 'bg-primary' => $statusFilter !== ''])>
                        <i class="bi bi-funnel-fill" style="font-size: 1rem;"></i>
                        FILTERS
                    </div>
                    <div tabindex="0"
                        class="dropdown-content menu bg-base-300 rounded-box z-1 w-52 p-2 shadow-sm flex flex-col gap-2">
                        <button wire:click="resetFilter()"
                            class="self-end font-bold bg-red-500 text-white text-xs py-1 px-2 active:scale-95 rounded-lg cursor-pointer">RESET</button>
                        <!-- role -->
                        <div class="bg-base-100 p-2 rounded-md">
                            <p class="font-bold">Status</p>
                            <select wire:model.defer="statusFilter"
                                class="select select-sm focus:ring-0 focus:outline-none">
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <!-- Filter button -->
                        <button wire:click="$refresh()" class="btn btn-primary btn-sm font-bold">FILTER</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grow overflow-hidden">
            <div class="h-full overflow-auto">
                <table class="table table-zebra table-pin-rows">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>EQUIPMENT TYPE</th>
                            <th>BRAND</th>
                            <th>MODEL</th>
                            <th>SERIAL NUMBER</th>
                            <th>MR NO</th>
                            <th>REMARKS</th>
                            <th>LOCATION</th>
                            <th>ACQUIRED DATE</th>
                            <th>ACCOUNTABLE</th>
                            <th>ACCOUNTABLE LAST KNOWN SECTION</th>
                            <th></th>
                        </tr>
                    </thead>
                    @if ($equipments->total())
                        <tbody>
                            @foreach ($equipments as $equipment)
                                <tr>
                                    <td> {{ $loop->index + 1 }}</td>
                                    <td>{{ $equipment->equipment_type_id }}</td>
                                    <td>{{ $equipment->brand }}</td>
                                    <td>{{ $equipment->model }}</td>
                                    <td>{{ $equipment->serial_number }}</td>
                                    <td>{{ $equipment->mr_no }}</td>
                                    <td>{{ $equipment->remarks }}</td>
                                    <td>{{ $equipment->location_id }}</td>
                                    <td>{{ $equipment->acquired_date }}</td>
                                    <td>{{ $equipment->person_accountable_id }}</td>
                                    <td>{{ $equipment->person_accountable_current_unit_id }}</td>
                                    <td>
                                        <div class="dropdown dropdown-left">
                                            <div tabindex="0" role="button" class="btn m-1"> <i class="bi bi-gear-fill"></i>
                                            </div>
                                            <ul tabindex="0"
                                                class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">

                                                <button x-on:click="activeTab = 'preventiveMaintenance'"
                                                    wire:key="equipment-{{ $equipment->equipment_id }}"
                                                    wire:click="setPMEquipmentId({{ $equipment->equipment_id }})" type="button"
                                                    class="button">PM</button>

                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
            @if(!$equipments->total())
                <h1 class="font-inter font-bold text-center my-4 text-xl">NO DATA</h1>
            @endif
        </div>
        <!-- table footer -->
        @if($equipments->total())
            <div class="mt-4 flex flex-col">
                @if($equipments->hasPages())
                    <p class="text-sm ml-auto font-bold">Page: {{ $equipments->currentPage() }}</p>
                @endif
                <div>
                    {{ $equipments->onEachSide(1)->links() }}
                </div>
            </div>
        @endif
        @if(!$equipments->hasPages() && $equipments)
            <div>
                <p class="text-sm font-bold">Total result(s): {{ $equipments->total() }}</p>
            </div>
        @endif
    </div>
</div>
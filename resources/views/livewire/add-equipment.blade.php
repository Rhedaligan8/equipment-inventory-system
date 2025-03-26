<div class="flex flex-col h-full overflow-hidden" wire:init="fetchData()">
    <button x-on:click="activeTab = 'equipments'" class="btn btn-sm btn-primary self-start text-base-100 mb-2">
        <i class="bi bi-arrow-left-short"></i>
        GO BACK</button>
    <div class="grow overflow-y-auto pr-4">
        <h3 class="text-xl font-bold font-inter my-2">ADD EQUIPMENT</h3>
        <!-- inputs -->
        <div class="flex gap-2 flex-col">
            <div x-data="{open: false}" wire:key="employee-list">
                <div class="flex flex-col w-full">
                    <label class="block" for="employee">Accountable</label>
                    @error('employee_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <input id="employee" type="search" placeholder="Search employee last name"
                        wire:model.debounce.500ms="employee_name" @focus="open = true"
                        @blur="setTimeout(() => open = false, 100)"
                        class="input focus:ring-0 focus:outline-none w-full" />
                    <div x-show="open" class="dropdown dropdown-open">
                        <div tabindex="0" role="button" class="btn hidden"></div>
                        <div tabindex="0"
                            class="dropdown-content menu bg-base-100 z-1 w-full shadow-sm border border-gray-500 absolute p-0 max-h-60">
                            <div class="h-full overflow-y-auto">
                                @if(count($employees))
                                    @foreach ($employees as $employee)
                                        <div wire:key="employee-{{ $employee->employee_id }}"
                                            wire:click="setSelectedEmployee({{ $employee }})"
                                            class="w-full hover:text-base-100 hover:bg-blue-500 transition-none rounded-none text-start justify-start border-black/50 border-0 border-b-2 p-2 cursor-pointer">
                                            {{ $employee->full_name }}
                                        </div>
                                    @endforeach
                                @else
                                    <p wire:loading.remove class=" font-bold text-sm text-center p-2">NO RESULT</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-data="{open: false}" wire:key="equipment-type-list">
                <div class="flex flex-col w-full">
                    <label class="block" for="equipment_type">Equipment Type</label>
                    @error('equipment_type_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <input id="equipment_type" type="search" placeholder="Search equipment type"
                        wire:model.debounce.500ms="equipment_type_name" @focus="open = true"
                        @blur="setTimeout(() => open = false, 100)"
                        class="input focus:ring-0 focus:outline-none w-full" />
                    <div x-show="open" class="dropdown dropdown-open">
                        <div tabindex="0" role="button" class="btn hidden"></div>
                        <div tabindex="0"
                            class="dropdown-content menu bg-base-100 z-1 w-full shadow-sm border border-gray-500 absolute p-0 max-h-60">
                            <div class="h-full overflow-y-auto">
                                @if(count($equipment_types))
                                    @foreach ($equipment_types as $equipment_type)
                                        <div wire:key="equipment_type-{{ $equipment_type->equipment_type_id }}"
                                            wire:click="setSelectedEquipmentType({{ $equipment_type }})"
                                            class="w-full hover:text-base-100 hover:bg-blue-500 transition-none rounded-none text-start justify-start border-black/50 border-0 border-b-2 p-2 cursor-pointer">
                                            {{ $equipment_type->name }}
                                        </div>
                                    @endforeach
                                @else
                                    <p wire:loading.remove class="font-bold text-sm text-center p-2">NO RESULT</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-data="{open: false}" wire:key="location-list">
                <div class="flex flex-col w-full">
                    <label class="block" for="location">Location</label>
                    @error('location_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <input id="location" type="search" placeholder="Search location name"
                        wire:model.debounce.500ms="location_name" @focus="open = true"
                        @blur="setTimeout(() => open = false, 100)"
                        class="input focus:ring-0 focus:outline-none w-full" />
                    <div x-show="open" class="dropdown dropdown-open">
                        <div tabindex="0" role="button" class="btn hidden"></div>
                        <div tabindex="0"
                            class="dropdown-content menu bg-base-100 z-1 w-full shadow-sm border border-gray-500 absolute p-0 max-h-60">
                            <div class="h-full overflow-y-auto">
                                @if(count($locations))
                                    @foreach ($locations as $location)
                                        <div wire:key="location-{{ $location->location_id }}"
                                            wire:click="setSelectedLocation({{ $location }})"
                                            class="w-full hover:text-base-100 hover:bg-blue-500 transition-none rounded-none text-start justify-start border-black/50 border-0 border-b-2 p-2 cursor-pointer">
                                            {{ $location->name }}
                                        </div>
                                    @endforeach
                                @else
                                    <p wire:loading.remove class="font-bold text-sm text-center p-2">NO RESULT</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label class="block" for="brand">Brand</label>
                <input id="brand" type="text" wire:model.defer="brand" placeholder="Brand"
                    class="input focus:ring-0 focus:outline-none w-full" />
                @error('brand') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block" for="model">Model</label>
                <input id="model" type="text" wire:model.defer="model" placeholder="Model"
                    class="input focus:ring-0 focus:outline-none w-full" />
                @error('model') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block" for="serial_number">Serial number</label>
                <input id="serial_number" type="text" wire:model.defer="serial_number" placeholder="Serial number"
                    class="input focus:ring-0 focus:outline-none w-full" />
                @error('serial_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block" for="mr_no">MR No</label>
                <input id="mr_no" type="text" wire:model.defer="mr_no" placeholder="MR No"
                    class="input focus:ring-0 focus:outline-none w-full" />
                @error('mr_no') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block" for="remarks">Remarks</label>
                <textarea id="remarks" class="textarea focus:ring-0 focus:outline-none w-full"
                    wire:model.defer="remarks" placeholder="Remarks"></textarea>
                @error('remarks') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block" for="acquired_date">Acquired Date</label>
                @error('acquired_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <input id="acquired_date" type="date" wire:model.defer="acquired_date" placeholder="Location name"
                    class="input focus:ring-0 focus:outline-none w-full" />
            </div>
        </div>
        <div class="flex items-center gap-2 mt-4 justify-end">
            <button wire:loading.attr="disabled" wire:click="addEquipment()"
                class="btn btn-primary text-base-100 focus:ring-0 focus:outline-none">
                <span wire:loading class="loading loading-spinner size-5"></span>ADD</button>
        </div>
    </div>
</div>
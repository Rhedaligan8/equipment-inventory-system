<div class="h-full flex flex-col">

    <div>
        <button wire:click="resetSelected" x-on:click="activeTab = 'equipments'"
            class="btn btn-sm btn-primary text-base-100 self-end mb-2">
            <i class="bi bi-arrow-left-short"> </i>
            GO BACK</button>
    </div>
    @if(!$equipment_id || !$equipment)
        <div class="size-full flex justify-center items-center">
            <div>
                <span class="loading loading-spinner loading-xl"></span>
            </div>
        </div>
    @else
        <div class=" flex flex-col grow overflow-hidden gap-4">
            <!-- header -->
            <h1 class="font-bold text-xl font-inter">Desktop PC/Laptop Maintenance Task Sheet For the Month of
                <select wire:model.defer="month" class="border border-black text-center">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                </select>
                -
                <input wire:model.defer="year" class="border border-black text-center w-24" type="text">
            </h1>

            <div class="flex justify-center gap-8 overflow-hidden grow">
                <!-- PM Form -->
                @if (strtolower($equipment->equipment_type->name) === "laptop" || strtolower($equipment->equipment_type->name) === "desktop")
                    <livewire:desktop-laptop-p-m />
                @elseif (strtolower($equipment->equipment_type->name) === "printer" || strtolower($equipment->equipment_type->name) === "scanner" || strtolower($equipment->equipment_type->name) === "printer/scanner")
                    <livewire:printer-scanner-p-m />
                @endif


                <!-- equipment information -->
                <div class="flex flex-col gap-2 w-sm shrink-0">
                    <h1 class="text-lg font-bold">Equipment Information</h1>
                    <div class="w-full flex flex-col">
                        <label class="w-36 inline-block ">Equipment Type</label>
                        <input readonly value="{{ $equipment->equipment_type->name }}" type="text"
                            placeholder="Equipment type" class="focus:ring-0 focus:outline-none input input-neutral " />
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="w-36 inline-block ">Brand</label>
                        <input readonly value="{{ $equipment->brand }}" type="text" placeholder="Brand"
                            class="focus:ring-0 focus:outline-none input input-neutral " />
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="w-36 inline-block ">Model</label>
                        <input readonly value="{{ $equipment->model }}" type="text" placeholder="Model"
                            class="focus:ring-0 focus:outline-none input input-neutral " />
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="w-36 inline-block ">Serial Number</label>
                        <input readonly value="{{ $equipment->serial_number }}" type="text" placeholder="Serial number"
                            class="focus:ring-0 focus:outline-none input input-neutral " />
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="w-36 inline-block ">MR No</label>
                        <input readonly value="{{ $equipment->equipment_type->name }}" type="text" placeholder="MR No"
                            class="focus:ring-0 focus:outline-none input input-neutral " />
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="w-36 inline-block ">Acquired Date</label>
                        <input readonly
                            value="{{$equipment->acquired_date ? $equipment->acquired_date->format('F j, Y') : "Unknown" }}"
                            type="text" placeholder="Acquired date"
                            class="focus:ring-0 focus:outline-none input input-neutral " />
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="w-36 inline-block ">Person Accountable</label>
                        <input readonly
                            value="{{ $equipment->employee->lastname . ', ' . $equipment->employee->firstname }}"
                            type="text" placeholder="Person accountable"
                            class="focus:ring-0 focus:outline-none input input-neutral " />
                    </div>
                    <div class="w-full flex flex-col">
                        <label class="w-36 inline-block ">Division/Section</label>
                        <input readonly
                            value="{{ $equipment->employee->unit->division->division_code . '/' . $equipment->employee->unit->unit_code }}"
                            type="text" placeholder="Person accountable"
                            class="focus:ring-0 focus:outline-none input input-neutral " />
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>
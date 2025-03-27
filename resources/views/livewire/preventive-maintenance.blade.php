@inject('pmUtils', 'App\Helpers\PMUtilities')
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
            <div class="flex justify-center gap-8 overflow-hidden grow">
                <!-- PM Form -->
                @if ($pmUtils::isValidDesktopLaptopPM($equipment->equipment_type->name))
                    <livewire:desktop-laptop-p-m :equipment_id="$equipment->equipment_id" />
                @elseif ($pmUtils::isValidPrinterScannerPM($equipment->equipment_type->name))
                    <livewire:printer-scanner-p-m :equipment_id="$equipment->equipment_id" />
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
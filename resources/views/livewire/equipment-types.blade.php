<div class="h-full">
    <div class="overflow-x-auto flex flex-col h-full">
    <button x-on:click="activeTab = 'addEquipmentType'"
        class="btn btn-sm btn-primary text-base-100 self-end mb-2">
        <i class="bi bi-box-fill"></i></i>
        ADD EQUIPMENT TYPE</button>
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
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>STATUS</th>
                        <th>
                            <button @class(['text-accent' => $orderBy == 'updated_at', 'hover:underline cursor-pointer hover:text-accent'])
                                wire:click="toggleOrder('updated_at')">UPDATED AT
                                @if($orderBy == 'updated_at' && $orderDirection == 'asc')
                                    <i class="bi bi-caret-up-fill" style="font-size: 1rem;"></i>
                                @elseif($orderBy == 'updated_at' && $orderDirection == 'desc')
                                    <i class="bi bi-caret-down-fill" style="font-size: 1rem;"></i>
                                @endif
                            </button>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                @if(!$equipment_types->total())
                <h1 class="font-inter font-bold text-center my-4 text-xl">NO DATA</h1>
                @endif
                @if ($equipment_types->total())
                    <tbody>
                        @foreach ($equipment_types as $equipment_type)
                            <tr>
                                <td> {{ $loop->index + 1 }}</td>
                                <td>{{ $equipment_type->name }}</td>
                                <td>{{ $equipment_type->description }}</td>
                                <td>  
                                    @if($equipment_type->status == 1)
                                    <div class="badge badge-soft badge-success font-bold">Active</div>
                                    @elseif($equipment_type->status == 0)
                                        <div class="badge badge-soft badge-error font-bold">Inactive</div>
                                    @endif
                                </td>
                                <td>{{ $equipment_type-> updated_at->format('F j, Y g:i A') }}</td>
                                <td><i class="bi bi-gear-fill"></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
            </div>
        </div>
        <!-- table footer -->
        @if($equipment_types->total())
            <div class="mt-4 flex flex-col">
                @if($equipment_types->hasPages())
                    <p class="text-sm ml-auto font-bold">Page: {{ $equipment_types->currentPage() }}</p>
                @endif
                <div>
                    {{ $equipment_types->onEachSide(1)->links() }}
                </div>
            </div>
        @endif
        @if(!$equipment_types->hasPages() && $equipment_types)
            <div>
                <p class="text-sm font-bold">Total result(s): {{ $equipment_types->total() }}</p>
            </div>
        @endif
    </div>
</div>
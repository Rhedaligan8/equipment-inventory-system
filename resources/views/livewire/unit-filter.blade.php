<div x-data="{open: false}" wire:init="fetchDivisionSections()">
    <div class="flex flex-col w-full">
        <input type="search" placeholder="Search employee last name" wire:model.debounce.500ms="division_section"
            @focus="open = true" @blur="setTimeout(() => open = false, 100)"
            class="input input-sm focus:ring-0 focus:outline-none w-full" />
        <div x-show="open" class="dropdown dropdown-open">
            <div tabindex="0" role="button" class="btn hidden"></div>
            <div tabindex="0"
                class="dropdown-content menu bg-base-100 z-1 w-full shadow-sm border border-gray-500 absolute p-0 max-h-60">
                <div class="h-full overflow-y-auto">
                    <div wire:loading class="p-2 flex items-center justify-center w-full overflow-y-hidden">
                        <span class="loading loading-spinner loading-sm text-center"></span>
                    </div>
                    @if(count($division_sections))
                        @foreach ($division_sections as $division_section)
                            <div wire:key="unit-{{ $division_section->unit_id }}"
                                wire:click="setSelected({{ $division_section }})"
                                class="w-full hover:text-base-100 hover:bg-blue-500 transition-none rounded-none text-start justify-start border-black/50 border-0 border-b-2 p-2 cursor-pointer">
                                {{ $division_section->division_section }}
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
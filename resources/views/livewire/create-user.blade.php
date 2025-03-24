<div wire:init="fetchEmployees()">
    <button wire:click="clearFields" x-on:click="activeTab = 'userTable'"
        class="btn btn-sm btn-primary text-base-100 self-end mb-2">
        <i class="bi bi-arrow-left-short"></i>
        GO BACK</button>
    <div class="flex flex-col items-center gap-2">
        <div class="avatar avatar-placeholder">
            <div class="text-neutral-content w-32 rounded-full bg-accent">
                <span class="text-4xl font-bold font-inter">{{ $initials }}</span>
            </div>
        </div>
        <div class="flex flex-col gap-2 w-80">
            <div x-data="{open: false}">
                <div class="flex flex-col w-full">
                    <label class="block" for="employee">Employee</label>
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
                                <div wire:loading class="p-2 flex items-center justify-center w-full overflow-y-hidden">
                                    <span class="loading loading-spinner loading-sm text-center"></span>
                                </div>
                                @if(count($employees))
                                    @foreach ($employees as $employee)
                                        <div wire:key="employee-{{ $employee->employee_id }}-not-user"
                                            wire:click="setSelected({{ $employee }})"
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
            <div>
                <label class="block" for="role"> Username</label>
                @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <input type="text" wire:model.defer="username" placeholder="Username"
                    class="input focus:ring-0 focus:outline-none w-full" />
            </div>
            <div>
                <label for="role">Role</label>
                <select wire:model.defer="role" id="role" class="select focus:ring-0 focus:outline-none w-full">
                    <option value="0">Staff</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div>
                <label for="status">Status</label>
                <select wire:model.defer="status" id="status" class="select focus:ring-0 focus:outline-none w-full">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            @if($employee_name && $employee_id)
                <button wire:key="create-button" wire:click="create" class="btn btn-primary text-base-100 w-full font-bold">
                    <span wire:loading class="loading loading-spinner size-5"></span>CREATE</button>
            @else
                <button disabled class="btn btn-primary text-base-100 w-full font-bold">
                    CREATE</button>
            @endif
        </div>
    </div>
</div>
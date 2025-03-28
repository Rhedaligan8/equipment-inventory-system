<div class="h-full flex flex-col">
    <button x-on:click="activeTab = 'createUser'" class="btn btn-sm btn-primary text-base-100 self-end mb-2">
        <i class="bi bi-person-fill-add items-center"></i>
        ADD USER</button>
    <div class="bg-base-100 border-2 border-neutral/25 rounded-md p-4 shadow-md grow overflow-hidden">
        <div class="overflow-x-auto flex flex-col h-full">
            <!-- header -->
            <div class="mb-4 flex justify-between">
                <div class="flex gap-1 items-center">
                    <select wire:model.debounce.500ms="perPage"
                        class="select w-20 focus:ring-0 focus:outline-none shrink-0">
                        <option value={{ 10 }}>10</option>
                        <option value={{ 20 }}>20</option>
                        <option value={{ 30 }}>30</option>
                        <option value={{ 40 }}>40</option>
                        <option value={{ 50 }}>50</option>
                    </select>
                    <input wire:model.debounce.500ms="username" type="search" placeholder="Search username"
                        class="input focus:ring-0 focus:outline-none  shrink-0 max-w-60 w-60" />
                    <div wire:loading class="ml-2"><span class="loading loading-spinner loading-sm"></span>
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="w-60">
                        <livewire:unit-filter />
                    </div>
                    <div class="w-60">
                        <livewire:employee-filter />
                    </div>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" @class(['btn m-1 btn-sm font-bold border border-black/50', 'bg-primary' => $roleFilter !== '' || $statusFilter !== '',])>
                            <i class="bi bi-funnel-fill" style="font-size: 1rem;"></i>
                            FILTERS
                        </div>
                        <div tabindex="0"
                            class="dropdown-content menu bg-base-300 rounded-box z-1 w-52 p-2 shadow-sm flex flex-col gap-2 border border-black/50">
                            <button wire:click="resetFilter()"
                                class="self-end font-bold bg-red-500 text-white text-xs py-1 px-2 active:scale-95 rounded-lg cursor-pointer">RESET</button>
                            <!-- role -->
                            <div class="bg-base-100 p-2 rounded-md">
                                <p class="font-bold">Role</p>
                                <select wire:model.defer="roleFilter"
                                    class="select select-sm focus:ring-0 focus:outline-none">
                                    <option value="">All</option>
                                    <option value="1">Admin</option>
                                    <option value="0">Staff</option>
                                </select>
                            </div>
                            <!-- status -->
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
                                <th>
                                    <button @class(['text-accent' => $orderBy == 'username', 'hover:underline cursor-pointer hover:text-accent flex items-center'])
                                        wire:click="toggleOrder('username')">USERNAME
                                        @if($orderBy == 'username' && $orderDirection == 'asc')
                                            <i class="bi bi-caret-up-fill" style="font-size: 1rem;"></i>
                                        @elseif($orderBy == 'username' && $orderDirection == 'desc')
                                            <i class="bi bi-caret-down-fill" style="font-size: 1rem;"></i>
                                        @endif
                                    </button>
                                </th>
                                <th>
                                    <button @class(['text-accent' => $orderBy == 'employee.lastname', 'hover:underline cursor-pointer hover:text-accent'])
                                        wire:click="toggleOrder('employee.lastname')">NAME
                                        @if($orderBy == 'employee.lastname' && $orderDirection == 'asc')
                                            <i class="bi bi-caret-up-fill" style="font-size: 1rem;"></i>
                                        @elseif($orderBy == 'employee.lastname' && $orderDirection == 'desc')
                                            <i class="bi bi-caret-down-fill" style="font-size: 1rem;"></i>
                                        @endif
                                    </button>
                                </th>
                                <th>
                                    <button @class(['text-accent' => $orderBy == 'division.division_code', 'hover:underline cursor-pointer hover:text-accent'])
                                        wire:click="toggleOrder('division.division_code')">DIVISION/UNIT
                                        @if($orderBy == 'division.division_code' && $orderDirection == 'asc')
                                            <i class="bi bi-caret-up-fill" style="font-size: 1rem;"></i>
                                        @elseif($orderBy == 'division.division_code' && $orderDirection == 'desc')
                                            <i class="bi bi-caret-down-fill" style="font-size: 1rem;"></i>
                                        @endif
                                    </button>
                                </th>
                                <th>
                                    <button @class(['text-accent' => $orderBy == 'role', 'hover:underline cursor-pointer hover:text-accent']) wire:click="toggleOrder('role')">ROLE
                                        @if($orderBy == 'role' && $orderDirection == 'asc')
                                            <i class="bi bi-caret-up-fill" style="font-size: 1rem;"></i>
                                        @elseif($orderBy == 'role' && $orderDirection == 'desc')
                                            <i class="bi bi-caret-down-fill" style="font-size: 1rem;"></i>
                                        @endif
                                    </button>
                                </th>
                                <th>
                                    <button @class(['text-accent' => $orderBy == 'status', 'hover:underline cursor-pointer hover:text-accent']) wire:click="toggleOrder('status')">STATUS
                                        @if($orderBy == 'status' && $orderDirection == 'asc')
                                            <i class="bi bi-caret-up-fill" style="font-size: 1rem;"></i>
                                        @elseif($orderBy == 'status' && $orderDirection == 'desc')
                                            <i class="bi bi-caret-down-fill" style="font-size: 1rem;"></i>
                                        @endif
                                    </button>
                                </th>
                                <th>
                                    <button @class(['text-accent' => $orderBy == 'created_at', 'hover:underline cursor-pointer hover:text-accent'])
                                        wire:click="toggleOrder('created_at')">CREATED AT
                                        @if($orderBy == 'created_at' && $orderDirection == 'asc')
                                            <i class="bi bi-caret-up-fill" style="font-size: 1rem;"></i>
                                        @elseif($orderBy == 'created_at' && $orderDirection == 'desc')
                                            <i class="bi bi-caret-down-fill" style="font-size: 1rem;"></i>
                                        @endif
                                    </button>
                                </th>
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
                        @if ($users->total())
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td> {{ $loop->index + 1 }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->employee->lastname . ', ' . $user->employee->firstname }}</td>
                                        <td class="flex items-center gap-2">
                                            {{ $user->employee->unit->division->division_code . '/' . $user->employee->unit->unit_code }}
                                            <div class="tooltip"
                                                data-tip="{{ $user->employee->unit->division->division_desc }} / {{ $user->employee->unit->unit_desc }}">
                                                <i class="bi bi-info-circle-fill text-accent"></i>
                                            </div>
                                        </td>
                                        <td>
                                            @if($user->role == 1)
                                                <div class="badge badge-soft badge-warning font-bold">Admin</div>
                                            @elseif($user->role == 0)
                                                <div class="badge badge-soft badge-info font-bold">Staff</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->status == 1)
                                                <div class="badge badge-soft badge-success font-bold">Active</div>
                                            @elseif($user->status == 0)
                                                <div class="badge badge-soft badge-error font-bold">Inactive</div>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('F j, Y g:i A')  }}</td>
                                        <td>{{ $user->updated_at->format('F j, Y g:i A')  }}</td>
                                        <td class="text-right"><i class="bi bi-gear-fill"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                    @if(!$users->total())
                        <h1 class="font-inter font-bold text-center my-4 text-xl">NO DATA</h1>
                    @endif
                </div>
            </div>
            <!-- table footer -->
            @if($users->total())
                <div class="mt-4 flex flex-col">
                    @if($users->hasPages())
                        <p class="text-sm ml-auto font-bold">Page: {{ $users->currentPage() }}</p>
                    @endif
                    <div>
                        {{ $users->onEachSide(1)->links() }}
                    </div>
                </div>
            @endif
            @if(!$users->hasPages() && $users)
                <div>
                    <p class="text-sm font-bold">Total result(s): {{ $users->total() }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="h-full bg-base-100 border-2 border-neutral/25 rounded-md p-4 shadow-md grow">
    <div class="flex flex-col h-full">
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
                    class="input focus:ring-0 focus:outline-none shrink-0 max-w-60 w-60" />
                <div wire:loading class="ml-2"><span class="loading loading-spinner loading-sm"></span>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" @class(['btn m-1 btn-sm font-bold border border-black/50', 'bg-primary' => $roleFilter !== '' || $typeFilter !== '',])>
                        <i class="bi bi-funnel-fill" style="font-size: 1rem;"></i>
                        FILTERS
                    </div>
                    <div tabindex="0"
                        class="border border-black/50 dropdown-content menu bg-base-300 rounded-box z-1 w-52 p-2 shadow-sm flex flex-col gap-2">
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
                        <!-- type -->
                        <div class="bg-base-100 p-2 rounded-md">
                            <p class="font-bold">Type</p>
                            <select wire:model.defer="typeFilter"
                                class="select select-sm focus:ring-0 focus:outline-none">
                                <option value="">All</option>
                                <option value="create">Create</option>
                                <option value="update">Update</option>
                                <option value="delete">Delete</option>
                                <option value="authentication">Authentication</option>
                                <option value="transfer">Transfer</option>
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
                        <th>USERNAME</th>
                        <th>ROLE</th>
                        <th>TYPE</th>
                        <th>MESSAGE</th>
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
                    </tr>
                </thead>
                @if ($logs->total())
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td> {{ $loop->index + 1 }}</td>
                                <td>{{ $log->user->username }}</td>
                                <td>  
                                    @if($log->user->role == 1)
                                        <div class="badge badge-soft badge-warning font-bold">Admin</div>
                                    @elseif($log->user->role == 0)
                                        <div class="badge badge-soft badge-info font-bold">Staff</div>
                                    @endif
                                </td>
                                <td>
                                <div class="badge badge-soft font-bold">{{ $log->type}}</div>
                                </td>
                                <td>{{ $log->message }}</td>
                                <td>{{ $log->created_at->format('F j, Y g:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
                        @if(!$logs->total())
                            <h1 class="font-inter font-bold text-center my-4 text-xl">NO DATA</h1>
                        @endif
            </div>
        </div>
        <!-- table footer -->
        @if($logs->total())
            <div class="mt-4 flex flex-col">
                @if($logs->hasPages())
                    <p class="text-sm ml-auto font-bold">Page: {{ $logs->currentPage() }}</p>
                @endif
                <div>
                    {{ $logs->onEachSide(1)->links() }}
                </div>
            </div>
        @endif
        @if(!$logs->hasPages() && $logs)
            <div>
                <p class="text-sm font-bold">Total result(s): {{ $logs->total() }}</p>
            </div>
        @endif
    </div>
</div>
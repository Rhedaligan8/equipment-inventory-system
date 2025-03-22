<div class="flex gap-2 items-center">
    @if (!$user_fullname)
        <div class="skeleton h-5 w-52"></div>
        <div class="skeleton h-5 w-16"></div>
    @else
        <p class="font-bold"> {{ $user_fullname }}</p>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-sm btn-ghost flex items-center btn-circle">
                <i class="bi bi-chevron-down"></i>
            </div>
            <ul tabindex="0"
                class="dropdown-content menu bg-base-100 rounded-box z-1 max-w-80 w-80 p-4 shadow-sm border border-base-300">
                <!-- avatar -->
                <div class="flex gap-2 items-center">
                    <!-- circle -->
                    <div class="avatar avatar-placeholder shrink-0">
                        <div class="bg-accent text-neutral-content w-12 rounded-full" wire:ignore>
                            <span class="text-lg font-bold">UI</span>
                        </div>
                    </div>
                    <!-- text information -->
                    <div class="grow w-40">
                        <p class="font-bold truncate">Halnin, Christopherssssssssssssssssssss</p>
                        <p>icteiis-admin</p>
                    </div>
                    <div class="shrink-0">
                        <!-- account role -->
                        @if(Auth::user()->role === 1)
                            <div class="badge badge-success font-bold">Admin</div>
                        @elseif(Auth::user()->role === 0)
                            <div class="badge badge-neutral font-bold">Staff</div>
                        @endif
                    </div>
                </div>
                <div class="divider"></div>
                <!-- buttons -->
                <div class="flex flex-col">
                    <a href="" class="btn btn-ghost font-bold text-left justify-start">
                        <i class="bi bi-person-fill-gear"></i>
                        Account Settings
                    </a>
                    <button wire:click="logout()" class="btn  btn-ghost font-bold text-left justify-start">
                        <i class="bi bi-box-arrow-left"></i>
                        Logout
                    </button>
                </div>

            </ul>
        </div>
    @endif
</div>
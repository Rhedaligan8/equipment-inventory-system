<div wire:init="getUserInformation()" class="flex flex-col items-center">
    @if($user_information)
        <div class="flex flex-col items-center gap-2">
            <div class="avatar avatar-placeholder">
                <div class="text-neutral-content w-32 rounded-full bg-accent">
                    <span class="text-4xl font-bold font-inter">{{ $initials }}</span>
                </div>
            </div>
            <h1 class="text-center font-bold text-xl">{{ $user_fullname }}</h1>
            @if(Auth::user()->role === 1)
                <div class="badge badge-success font-bold">Admin</div>
            @elseif(Auth::user()->role === 0)
                <div class="badge badge-neutral font-bold">Staff</div>
            @endif
        </div>
        <div class="mt-4 flex flex-col gap-2">
            <div>
                <p>Username</p>
                <p class="w-80 font-bold border rounded-md p-2">{{ $user_information->username }}</p>
            </div>
            <div>
                <p>Division / Section</p>
                <div class="w-80 font-bold border rounded-md p-2 flex items-center justify-between">
                    <span>{{ $division_code }} / {{ $unit_code }}</span>
                    <div class="tooltip" data-tip="{{ $division_desc }} / {{ $unit_desc }}">
                        <i class="bi bi-info-circle-fill text-accent"></i>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
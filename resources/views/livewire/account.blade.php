<div wire:init="getUserInformation()"
    class="flex flex-col items-center overflow-hidden overflow-y-auto h-full bg-base-100 border-2 border-neutral/25 rounded-md p-4 shadow-md">
    @if($user_information)
        <p class=" self-start"><b>Date created:
            </b>{{ $user_information->created_at->format('F j, Y')}}</p>
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
                <div class="w-80 font-bold border rounded-md flex py-1 px-2 items-center justify-between">
                    <span>{{ $division_code }} / {{ $unit_code }}</span>
                    <div class="tooltip" data-tip="{{ $division_desc }} / {{ $unit_desc }}">
                        <i class="bi bi-info-circle-fill text-accent"></i>
                    </div>
                </div>
            </div>
            <div x-data="{isChangingPassword: @entangle('isChangingPassword').defer}" class="w-80">
                <div class="flex gap-2 items-center" x-cloak x-show="!isChangingPassword">
                    <div class="grow">
                        <p>Password</p>
                        <p class=" font-bold border rounded-md p-2">*********</p>
                    </div>
                    <i x-on:click="isChangingPassword = true" class="bi bi-pencil-square cursor-pointer"></i>
                </div>
                <div x-cloak x-show="isChangingPassword">
                    <div class="flex">
                        <i wire:click="cancelChangePassword" x-on:click="isChangingPassword = false"
                            class="bi bi-x-circle-fill cursor-pointer ml-auto" style="font-size: 1.2rem;"></i>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div>
                            <label for="currentPassword">Current password</label>
                            <input wire:model.defer="currentPassword" id="currentPassword" type="text"
                                placeholder="Current password"
                                class="focus:ring-0 focus:outline-none input input-neutral" />
                            @error('currentPassword') <span class="text-red-500 text-sm">{{ $message ?? '' }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="newPassword">New password</label>
                            <input wire:model.defer="newPassword" id="newPassword" type="text" placeholder="New password"
                                class="focus:ring-0 focus:outline-none input input-neutral" />
                            @error('newPassword') <span class="text-red-500 text-sm">{{  $message ?? ''  }}</span> @enderror
                        </div>
                        <div>
                            <label for="confirmPassword">Confirm password</label>
                            <input wire:model.defer="confirmPassword" id="confirmPassword" type="text"
                                placeholder="Confirm password"
                                class="focus:ring-0 focus:outline-none input input-neutral" />
                            @error('confirmPassword') <span class="text-red-500 text-sm">{{ $message ?? '' }}</span>
                            @enderror
                        </div>
                        <button wire:loading.attr="disabled" wire:click="changePassword"
                            class="focus:ring-0 focus:outline-none btn btn-primary text-base-100 font-bold">
                            Change password</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <span class="loading loading-spinner size-5"></span>
    @endif
</div>
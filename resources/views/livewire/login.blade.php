<div class="h-full">
    <div class="flex flex-col overflow-y-auto size-full">
        <div class="max-w-[500px] my-auto w-full mx-auto relative">
            <div
                class="backdrop-blur-sm relative z-10 p-8 shadow-xl  bg-gradient-to-b from-blue-400/20 from-30% to-white/10 to-50%  rounded-lg">
                <!-- header -->
                <div class="flex flex-col items-center gap-2 mb-2">
                    <x-pnri-logo class="shrink-0 max-w-20 max-h-20 size-20" />
                    <h1 class="text-2xl font-bold text-center font-inter">ICT EQUIPMENT INVENTORY</h1>
                </div>
                <!-- inputs -->
                <form wire:submit.prevent="login" class="flex flex-col gap-3">
                    <!-- username -->
                    <div>
                        <label class="input w-full">
                            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                    stroke="currentColor">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </g>
                            </svg>
                            <input wire:model.defer="username" type="input" placeholder="Username" />
                        </label>
                        @error('username') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>
                    <!-- password -->
                    <div>
                        <label class="input w-full">
                            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                    stroke="currentColor">
                                    <path
                                        d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                                    </path>
                                    <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                </g>
                            </svg>
                            <input wire:model.defer="password" type="password" placeholder="Password" />
                        </label>
                        @error('password') <small class="text-red-500">{{ $message }}</small> @enderror
                    </div>
                    <!-- login button -->
                    <button class="btn btn-primary w-full">
                        <span wire:loading class="loading loading-spinner size-5"></span>
                        LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>
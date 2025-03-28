<div class="h-full flex flex-col">
    <button x-on:click="activeTab = 'locationsTable'" class="btn btn-sm btn-primary text-base-100 self-start mb-2">
        <i class="bi bi-arrow-left-short"></i>
        GO BACK</button>
    <div class="bg-base-100 border-2 border-neutral/25 rounded-md p-4 shadow-md grow overflow-hidden">
        <div class="overflow-x-auto h-full">
            <h3 class="text-xl font-bold font-inter my-2">ADD LOCATION</h3>
            <!-- inputs -->
            <div class="flex gap-2 flex-col">
                <div>
                    <label class="block" for="role">Location name</label>
                    <input type="text" wire:model.defer="name" placeholder="Location name"
                        class="input focus:ring-0 focus:outline-none w-full" />
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block" for="role">Remarks</label>
                    <textarea wire:model.defer="remarks" placeholder="Remarks"
                        class="textarea focus:ring-0 focus:outline-none w-full"></textarea>
                </div>
                <div>
                    <label for="status">Status</label>
                    <select wire:model.defer="status" id="status" class="select focus:ring-0 focus:outline-none w-full">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>
            <div class="flex items-center gap-2 mt-4 justify-end">
                <button wire:loading.attr="disabled" wire:click="create()"
                    class="btn btn-primary text-base-100 focus:ring-0 focus:outline-none">
                    <span wire:loading class="loading loading-spinner size-5"></span>ADD</button>
            </div>
        </div>
    </div>
</div>
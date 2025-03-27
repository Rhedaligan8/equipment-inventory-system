<div class="h-full">
    <div class="overflow-x-auto flex flex-col h-full">
        <button wire:click="resetHistory()" x-on:click="activeTab = 'equipments'"
            class="btn btn-sm btn-primary text-base-100 mb-2 self-start">
            <i class="bi bi-arrow-left-short"></i>
            GO BACK</button>
        @if ($equipment_id)
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
                    <div wire:loading class="ml-2"><span class="loading loading-spinner loading-sm"></span>
                    </div>
                </div>
                <div class="flex gap-2 items-center">

                </div>
            </div>
            <div class="grow overflow-hidden">
                <div class="h-full overflow-auto">
                    <table class="table table-zebra table-pin-rows">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>MONTH</th>
                                <th>DAY</th>
                                <th>YEAR</th>
                                <th></th>
                            </tr>
                        </thead>
                        @if ($desktop_laptops->total())
                            <tbody>
                                @foreach ($desktop_laptops as $desktop_laptop)
                                    <tr>
                                        <td> {{ $loop->index + 1 }}</td>

                                        <td>{{ $desktop_laptop->created_at->format('F') }}</td>

                                        <td>{{ $desktop_laptop->created_at->format('d') }}</td>

                                        <td>{{ $desktop_laptop->created_at->format('Y') }}</td>

                                        <td class="text-right">
                                            <button onclick="openNewTab('{{ $desktop_laptop->desktop_laptop_pm_history_id }}')"
                                                class="btn btn-ghost">
                                                <i class="bi bi-arrow-right"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                @if(!$desktop_laptops->total())
                    <h1 class="font-inter font-bold text-center my-4 text-xl">NO DATA</h1>
                @endif
            </div>
            <!-- table footer -->
            @if($desktop_laptops->total())
                <div class="mt-4 flex flex-col">
                    @if($desktop_laptops->hasPages())
                        <p class="text-sm ml-auto font-bold">Page: {{ $desktop_laptops->currentPage() }}</p>
                    @endif
                    <div>
                        {{ $desktop_laptops->onEachSide(1)->links() }}
                    </div>
                </div>
            @endif
            @if(!$desktop_laptops->hasPages() && $desktop_laptops)
                <div>
                    <p class="text-sm font-bold">Total result(s): {{ $desktop_laptops->total() }}</p>
                </div>
            @endif
        @else
            <div class="flex justify-center">
                <span class="loading loading-spinner size-5"></span>
            </div>
        @endif
    </div>

    <script>
        function openNewTab(desktop_laptop_pm_history_id) {
            const width = screen.width * 0.5;  // 75% of screen width
            const height = screen.height * 0.75;  // 75% of screen height
            const left = (screen.width - width) / 2;
            const top = (screen.height - height) / 2;

            const newWindow = window.open('{{ route("desktop-laptop-pm-preview") }}?id=' + desktop_laptop_pm_history_id, '_blank',
                `width=${width},height=${height},top=${top},left=${left},toolbar=no,menubar=no,scrollbars=no,resizable=yes`);

            newWindow.onload = function () {
                newWindow.print();  // Open print dialog
            };

        }
    </script>

</div>
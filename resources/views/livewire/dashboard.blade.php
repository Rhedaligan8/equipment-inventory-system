<div class="flex h-full bg-base-300" x-data="{activeTab: 'users'}">
    <livewire:sidebar />
    <div class="grow flex flex-col">
        <livewire:header />
        <div class="m-6 bg-base-100 grow border-2 border-neutral/25 rounded-md p-4 shadow-md">
            <section x-show="activeTab == 'users'">
                <livewire:users />
            </section>

            <section x-show="activeTab == 'logs'">
                <livewire:logs />
            </section>
        </div>
    </div>
</div>
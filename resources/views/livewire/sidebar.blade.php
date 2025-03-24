<div class="flex flex-col min-w-72 p-4 bg-base-100 border-r-2 border-neutral/25 shadow-md">
    <!-- header -->
    <div class="flex items-center gap-4 justify-center">
        <x-pnri-logo class="size-10" />
        <h1 class="font-inter text-2xl font-bold">ICTEIIS</h1>
    </div>
    <div class="divider mt-4"></div>
    <!-- tabs -->
    <div class="flex flex-col gap-1">
        <button :class="activeTab === 'equipments' && 'bg-primary text-base-100'" @click="activeTab = 'equipments'"
            class="btn btn-ghost text-start justify-start gap-2  font-bold">
            <i class="bi bi-pc-display"></i> Equipments
        </button>
        <button :class="activeTab === 'equipment_types' && 'bg-primary text-base-100'"
            @click="activeTab = 'equipment_types'" class="btn btn-ghost text-start justify-start gap-2 font-bold">
            <i class="bi bi-box-fill"></i> Equipment Types
        </button>
        <button :class="activeTab === 'locations' && 'bg-primary text-base-100'" @click="activeTab = 'locations'"
            class="btn btn-ghost text-start justify-start gap-2 font-bold">
            <i class="bi bi-geo-alt-fill"></i> Locations
        </button>
        @if(Auth::user()->role === 1)
            <button :class="activeTab === 'users' && 'bg-primary text-base-100'" @click="activeTab = 'users'"
                class="btn btn-ghost text-start justify-start gap-2 font-bold">
                <i class="bi bi-people-fill"></i> Users
            </button>
            <button :class="activeTab === 'logs' && 'bg-primary text-base-100'" @click="activeTab = 'logs'"
                class="btn btn-ghost text-start justify-start gap-2 font-bold">
                <i class="bi bi-card-list"></i> Logs
            </button>
        @endif
        <button :class="activeTab === 'account' && 'bg-primary text-base-100'" @click="activeTab = 'account'"
            class="btn btn-ghost text-start justify-start gap-2 font-bold">
            <i class="bi bi-person-fill-gear"></i> Account Settings
        </button>
    </div>
</div>
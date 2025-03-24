<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EquipmentType;
use Livewire\WithPagination;

class EquipmentTypes extends Component
{
    use WithPagination;

    protected $listeners = ['updateEquipmentTypesTable'];

    public $perPage = 10;
    public $name = "";
    public $orderDirection = "desc";
    public $orderBy = "updated_at";
    public $statusFilter = "";

    public function resetFilter()
    {
        if ($this->statusFilter != "") {
            $this->statusFilter = "";
        }
    }

    public function updateEquipmentTypesTable()
    {
        $this->emit('$refresh');
    }

    public function toggleOrder($orderBy)
    {
        if ($this->orderBy == $orderBy) {
            $this->orderDirection = $this->orderDirection == "asc" ? "desc" : "asc";
        } else {
            $this->orderDirection = "desc";
        }
        $this->orderBy = $orderBy;
        $this->resetPage('locationsPage');
    }

    public function updated()
    {
        $this->resetPage('locationsPage');
    }

    public function render()
    {
        return view(
            'livewire.equipment-types',
            [
                'equipment_types' => EquipmentType::
                    where('name', 'like', $this->name . '%')
                    ->when($this->statusFilter !== "", function ($query) {
                        $query->where('status', $this->statusFilter);
                    })
                    ->orderBy($this->orderBy, $this->orderDirection)
                    ->paginate($this->perPage, ['*'], "locationsPage")
            ]
        )->layout("layouts.dashboard");
    }
}

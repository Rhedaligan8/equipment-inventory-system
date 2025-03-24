<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Equipment;
use Livewire\WithPagination;

class Equipments extends Component
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
        $this->resetPage('equipmentsPage');
    }

    public function setPMEquipmentId($equipment_id)
    {
        $this->emit("equipment_to_pm_id", $equipment_id);
    }

    public function updated()
    {
        $this->resetPage('equipmentsPage');
    }

    public function render()
    {
        return view(
            'livewire.equipments',
            [
                'equipments' => Equipment::paginate($this->perPage, ['*'], "equipmentsPage")
            ]
        )->layout("layouts.dashboard");
    }
}

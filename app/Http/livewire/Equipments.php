<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Equipment;
use Livewire\WithPagination;

class Equipments extends Component
{
    use WithPagination;

    protected $listeners = ['updateEquipmentsTable'];

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

    public function updateEquipmentsTable()
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
    public function setEquipmentToEditId($equipment_id)
    {
        $this->emit("equipment_to_edit_id", $equipment_id);
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
                'equipments' => Equipment::select('equipments.*')
                    ->join('equipment_types', 'equipment_types.equipment_type_id', '=', 'equipments.equipment_type_id')
                    ->join('infosys.employee', 'infosys.employee.employee_id', '=', 'equipments.person_accountable_id')
                    ->join('infosys.unit', 'infosys.unit.unit_id', '=', 'equipments.person_accountable_current_unit_id')
                    ->join('infosys.division', 'infosys.division.division_id', '=', 'infosys.unit.unit_div')
                    ->orderBy($this->orderBy, $this->orderDirection)
                    ->paginate($this->perPage, ['*'], "equipmentsPage")
            ]
        )->layout("layouts.dashboard");
    }
}

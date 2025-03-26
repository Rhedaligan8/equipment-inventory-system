<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Equipment;

class PreventiveMaintenance extends Component
{

    public $equipment_id = '';
    public $equipment = '';
    public $month = '';
    public $year = '';
    protected $listeners = ["equipment_to_pm_id" => 'updateEquipment'];

    public function updateEquipment($equipment_id)
    {
        $this->year = strtolower(Carbon::now()->format('Y'));
        $this->month = strtolower(Carbon::now()->format('F'));
        $this->equipment_id = $equipment_id;

        $this->equipment = Equipment::select('equipments.*')
            ->join('equipment_types', 'equipment_types.equipment_type_id', '=', 'equipments.equipment_type_id')
            ->join('infosys.employee', 'infosys.employee.employee_id', '=', 'equipments.person_accountable_id')
            ->join('infosys.unit', 'infosys.unit.unit_id', '=', 'equipments.person_accountable_current_unit_id')
            ->join('infosys.division', 'infosys.division.division_id', '=', 'infosys.unit.unit_div')
            ->where("equipments.equipment_id", '=', $equipment_id)
            ->first();
    }

    public function resetSelected()
    {
        $this->equipment_id = "";
        $this->equipment = "";
    }

    public function render()
    {
        return view('livewire.preventive-maintenance');
    }
}

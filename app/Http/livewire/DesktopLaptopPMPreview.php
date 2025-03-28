<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DesktopLaptopPM;
use App\Models\Equipment;
use App\Models\Unit;

class DesktopLaptopPMPreview extends Component
{

    public $equipment;
    public $equipment_pm;
    public $division_section;


    public function mount()
    {
        $desktop_laptop_pm_history_id = request('id');

        $this->equipment_pm = DesktopLaptopPM::find($desktop_laptop_pm_history_id);

        $this->equipment = Equipment::select('equipments.*')
            ->join('equipment_types', 'equipment_types.equipment_type_id', '=', 'equipments.equipment_type_id')
            ->join('infosys.employee', 'infosys.employee.employee_id', '=', 'equipments.person_accountable_id')
            ->join('infosys.unit', 'infosys.unit.unit_id', '=', 'equipments.person_accountable_current_unit_id')
            ->join('infosys.division', 'infosys.division.division_id', '=', 'infosys.unit.unit_div')->first();

        $this->division_section = Unit::with('division')->firstWhere('unit_id', $this->equipment_pm->unit_id);
    }

    public function render()
    {
        return view('livewire.desktop-laptop-p-m-preview')->layout("layouts.pm-preview");
    }
}

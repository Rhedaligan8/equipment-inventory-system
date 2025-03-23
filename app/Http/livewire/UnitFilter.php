<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;

class UnitFilter extends Component
{

    public $division_section = '';
    public $unit_id = '';

    public $division_sections = [];

    public function fetchDivisionSections()
    {
        $this->division_sections = Unit::leftJoin("infosys.division", "infosys.division.division_id", "=", "unit_div")
            ->selectRaw("*, CONCAT(IFNULL(infosys.division.division_code, 'No Division'), ' - ',infosys.unit.unit_desc) as division_section")
            ->whereRaw("CONCAT(IFNULL(infosys.division.division_code, 'No Division'), ' - ', infosys.unit.unit_desc) LIKE ?", [$this->division_section . '%'])
            ->get();
    }

    public function setSelected($division_section)
    {
        $division = $division_section["division_code"] ? $division_section["division_code"] : "No Division";
        $this->division_section = $division . ' - ' . $division_section["unit_desc"];
        $this->fetchDivisionSections();
        $this->emitUp('searchUnitById', $division_section["unit_id"]);
    }

    public function updated()
    {
        $this->fetchDivisionSections();
        if (!$this->division_section) {
            // this refreshes the table when field is cleared
            $this->emitUp('searchUnitById', '');
        }
    }

    public function render()
    {
        return view('livewire.unit-filter');
    }
}

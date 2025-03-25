<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

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
    }
    public function render()
    {
        return view('livewire.preventive-maintenance');
    }
}

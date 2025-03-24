<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PreventiveMaintenance extends Component
{

    public $equipment_id = '';
    protected $listeners = ["equipment_to_pm_id" => 'updateEquipment'];

    public function updateEquipment($equipment_id)
    {
        $this->equipment_id = $equipment_id;
    }
    public function render()
    {
        return view('livewire.preventive-maintenance');
    }
}

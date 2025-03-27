<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DesktopLaptopPMModel;
use Livewire\WithPagination;

class DesktopLaptopPMHistory extends Component
{
    use WithPagination;

    protected $listeners = ['pm_history_equipment__id' => "setEquipmentId"];

    public $equipment_id;

    public $perPage = 10;
    public $orderDirection = "desc";
    public $orderBy = "created_at";

    public function toggleOrder($orderBy)
    {
        if ($this->orderBy == $orderBy) {
            $this->orderDirection = $this->orderDirection == "asc" ? "desc" : "asc";
        } else {
            $this->orderDirection = "desc";
        }
        $this->orderBy = $orderBy;
        $this->resetPage('desktopLaptopPMHistory');
    }

    public function setEquipmentId($equipment_id)
    {
        $this->equipment_id = $equipment_id;
    }

    public function resetHistory()
    {
        $this->equipment_id = "";
    }

    public function render()
    {
        return view(
            'livewire.desktop-laptop-p-m-history',
            [
                'desktop_laptops' => DesktopLaptopPMModel::where('equipment_id', $this->equipment_id)
                    ->orderBy($this->orderBy, $this->orderDirection)
                    ->paginate($this->perPage, ['*'], "desktopLaptopPMHistory")
            ]
        )->layout("layouts.dashboard");
    }
}

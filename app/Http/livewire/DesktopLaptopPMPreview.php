<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DesktopLaptopPMPreview extends Component
{

    public $equipment;


    public function mount()
    {
        $desktop_laptop_pm_history_id = request('desktop_laptop_pm_history_id');

    }

    public function render()
    {
        return view('livewire.desktop-laptop-p-m-preview')->layout("layouts.pm-preview");
    }
}

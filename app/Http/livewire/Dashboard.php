<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $active_tab = 'users';

    protected $listeners = ['change_tab'];

    public function change_tab($tab_name)
    {
        $this->active_tab = $tab_name;
    }

    public function render()
    {
        return view('livewire.dashboard')->layout("layouts.main");
    }
}

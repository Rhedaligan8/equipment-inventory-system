<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Account extends Component
{
    public $user_information;
    public $initials;
    public $user_fullname;
    public $division_code;
    public $unit_code;
    public $division_desc;
    public $unit_desc;

    public function getUserInformation()
    {
        $this->user_information = User::with("employee")->find(Auth::user()->user_id);
        $this->initials = strtoupper($this->user_information->employee->lastname[0] . $this->user_information->employee->firstname[0]);
        $this->user_fullname = $this->user_information->employee->lastname . ', ' . $this->user_information->employee->firstname;
        $this->unit_code = $this->user_information->employee->unit->unit_code;
        $this->division_code = $this->user_information->employee->unit->division->division_code;
        $this->unit_desc = $this->user_information->employee->unit->unit_desc;
        $this->division_desc = $this->user_information->employee->unit->division->division_desc;
    }

    public function render()
    {
        return view('livewire.account');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Support\Facades\Cache;
class UserMenu extends Component
{
    public $user_fullname;
    public $initials;

    public function fetchUserEmployeeInformation()
    {
        $user_employee_information = Employee::find(Auth::user()->employee_id);
        $this->user_fullname = $user_employee_information->lastname . ', ' . $user_employee_information->firstname;
        $this->initials = strtoupper($user_employee_information->lastname[0] . $user_employee_information->firstname[0]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }

    public function render()
    {
        return view('livewire.user-menu');
    }
}

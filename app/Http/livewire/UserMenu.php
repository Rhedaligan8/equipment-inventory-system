<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
class UserMenu extends Component
{
    public $user_fullname;

    public function fetchUserEmployeeInformation()
    {
        $user_employee_information = Employee::find(Auth::user()->employee_id);
        $this->user_fullname = $user_employee_information->lastname . ', ' . $user_employee_information->firstname;
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

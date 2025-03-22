<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Support\Facades\Cache;
class UserMenu extends Component
{
    public $user_fullname;

    public function fetchUserEmployeeInformation()
    {
        // $user_employee_information = Employee::find(Auth::user()->employee_id);
        // $this->user_fullname = $user_employee_information->lastname . ', ' . $user_employee_information->firstname;

        $userId = Auth::user()->employee_id;

        $this->user_fullname = Cache::remember("user_fullname_{$userId}", 60, function () use ($userId) {
            $user = Employee::find($userId);
            return $user ? $user->lastname . ', ' . $user->firstname : 'Unknown User';
        });
    }

    public function mount()
    {
        // Cache the user's name for 10 minutes to avoid reloading
        $this->user_fullname = Cache::remember("user_" . Auth::id(), 600, function () {
            $user = Employee::find(Auth::user()->employee_id);
            return $user->lastname . ', ' . $user->firstname;
        });
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

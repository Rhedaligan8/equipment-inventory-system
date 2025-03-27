<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
use App\Models\Log;

class Account extends Component
{
    public $user_information;
    public $initials;
    public $user_fullname;
    public $division_code;
    public $unit_code;
    public $division_desc;
    public $unit_desc;

    public $isChangingPassword = false;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'currentPassword' => 'required',
        'newPassword' => 'required|max:255|min:8',
        'confirmPassword' => 'same:newPassword',
    ];

    protected $messages = [
        'currentPassword.required' => '*Enter your current password.',
        'newPassword.required' => '*Enter your new password.',
        'newPassword.max' => '*New password too long.',
        'newPassword.min' => '*New password must be at least 8 characters long.',
        'confirmPassword.same' => '*Confirm password does not match.',
    ];

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

    public function changePassword()
    {

        $this->currentPassword = trim($this->currentPassword);
        $this->newPassword = trim($this->newPassword);

        $this->validate();

        if (Hash::check($this->currentPassword, Auth::user()->password)) {
            $newPassword = User::where("user_id", Auth::user()->user_id)->update(
                ["password" => Hash::make($this->newPassword)]
            );

            if ($newPassword) {
                $this->emit('trigger-toast', 'Password changed.', 'success');
                $this->emit('updateLocationsTable');

                $message = "Change user password";
                Log::create([
                    'user_id' => Auth::user()->user_id,
                    'type' => 'update',
                    'message' => $message,
                ]);
                $this->emit('updateLogsTable');
                $this->isChangingPassword = false;
                $this->reset([
                    'currentPassword',
                    'newPassword',
                    'confirmPassword',
                ]);
            }
        } else {
            $this->addError('currentPassword', '*Incorrect password.');
        }
    }

    public function cancelChangePassword()
    {
        $this->reset([
            'currentPassword',
            'newPassword',
            'confirmPassword',
        ]);
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.account');
    }
}

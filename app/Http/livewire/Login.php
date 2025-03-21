<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    public $username, $password;

    protected $rules = [
        "username" => "required",
        "password" => "required"
    ];

    protected $messages = [
        "username.required" => "*Please enter your username.",
        "password.required" => "*Please enter your password."
    ];

    public function login()
    {
        $this->username = trim($this->username);
        $this->password = trim($this->password);
        $this->validate();

        $user = User::where("username", $this->username)->first();

        // check username
        if (!$user) {
            $this->addError("username", "*Username does not exists.");
            return;
        }
        // check password if match
        if (!Hash::check($this->password, $user->password)) {
            // run if not matched
            $this->addError("password", "*Password incorrect.");
            return;
        } else if ($user->status == "0") {
            // run if user is inactive
            $this->addError("username", "*Account is inactive.");
            return;
        } else {
            // run if matched and user is active
            Auth::login($user);
            redirect()->intended("dashboard");
        }
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.main');
    }
}

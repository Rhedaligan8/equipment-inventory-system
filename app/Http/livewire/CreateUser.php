<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class CreateUser extends Component
{
    public $initials;
    public $employee_name;
    public $username;
    public $role = 0;
    public $status = 1;
    public $employee_id = '';
    public $employees = [];

    protected $rules = [
        'username' => 'required|min:8|max:50|unique:icteiis.users,username',
        'employee_id' => 'required',
    ];

    protected $messages = [
        'username.required' => '*Username is required.',
        'username.unique' => '*Username is taken.',
        'username.min' => '*Username must be at least 8 characters long..',
        'username.max' => '*Username too long.',
        'employee_id.required' => '*Select an employee.'
    ];

    public function fetchEmployees()
    {
        $this->employees = Employee::selectRaw("employee.employee_id, firstname, lastname, CONCAT(lastname, ' ', firstname) as full_name")
            ->leftJoin('icteiis.users', 'icteiis.users.employee_id', '=', 'employee.employee_id') // Correct join
            ->whereNull('icteiis.users.employee_id') // Exclude existing users
            ->whereRaw("CONCAT(lastname, ' ', firstname) LIKE ?", [$this->employee_name . '%'])
            ->limit(20)
            ->get();
    }

    public function setSelected($employee)
    {
        $this->employee_name = $employee['full_name'];
        $this->employee_id = $employee['employee_id'];
        $this->initials = $employee['lastname'][0] . $employee['firstname'][0];
        $this->username = "icteiis-" . strtolower($this->initials) . "-" . User::count() + 1;
        $this->resetErrorBag('username');
        $this->resetErrorBag('employee_id');
        $this->fetchEmployees();
    }

    public function updatedEmployeeName()
    {
        $this->fetchEmployees();
        $this->initials = '';
        $this->username = '';
        $this->employee_id = '';
    }

    public function clearFields()
    {
        $this->initials = '';
        $this->employee_name = '';
        $this->username = '';
        $this->role = 0;
        $this->status = 1;
        $this->employee_id = '';
        $this->resetValidation();
        $this->fetchEmployees();
    }

    public function create()
    {

        // force logout user if the role is not admin
        if (Gate::denies('access')) {
            Auth::logout();
            return redirect()->route("login");
        }

        $this->username = trim($this->username);

        try {
            $this->validate(); // If validation fails, it throws an exception

            $new_user = User::create([
                'employee_id' => $this->employee_id,
                'username' => $this->username,
                'password' => Hash::make($this->username . '-' . 'password'),
                'status' => $this->status,
                'role' => $this->role,
            ]);

            if ($new_user) {
                $message = "New user created - username: {$this->username}";
                Log::create([
                    'user_id' => Auth::user()->user_id,
                    'type' => 'create',
                    'message' => $message,
                ]);
                $this->emit('updateLogsTable');
            }

            // Reset inputs after successful creation
            $this->reset(['employee_name', 'username', 'employee_id']);
            $this->resetValidation(); // Clear validation messages
            $this->initials = '';
            $this->emit('updateUserTable');
            $this->fetchEmployees();
            $this->emit('trigger-toast', 'New user created.', 'success');
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->fetchEmployees();
            $this->setErrorBag($e->validator->getMessageBag());
        }
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}

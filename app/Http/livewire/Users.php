<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    protected $listeners = ['searchEmployeeById', 'searchUnitById', 'updateUserTable'];

    public $perPage = 10;
    public $username = "";
    public $orderDirection = "desc";
    public $orderBy = "created_at";
    public $roleFilter = "";
    public $statusFilter = "";

    public $employee_id = "";
    public $unit_id = "";

    public function resetFilter()
    {
        if ($this->roleFilter != "" || $this->statusFilter != "") {
            $this->roleFilter = "";
            $this->statusFilter = "";
        }
    }

    public function searchEmployeeById($employee_id)
    {
        $this->employee_id = $employee_id;
    }
    public function searchUnitById($unit_id)
    {
        $this->unit_id = $unit_id;
    }

    public function updateUserTable()
    {
        $this->emit('$refresh');
    }

    public function toggleOrder($orderBy)
    {
        if ($this->orderBy == $orderBy) {
            $this->orderDirection = $this->orderDirection == "asc" ? "desc" : "asc";
        } else {
            $this->orderDirection = "desc";
        }
        $this->orderBy = $orderBy;
    }

    public function updated()
    {
        $this->resetPage('usersPage');
    }

    public function render()
    {
        return view(
            'livewire.users',
            [
                'users' => User::select('users.*')
                    ->join('infosys.employee', 'infosys.employee.employee_id', '=', 'users.employee_id')
                    ->join('infosys.unit', 'infosys.unit.unit_id', '=', 'infosys.employee.unit_unit_id')
                    ->join('infosys.division', 'infosys.division.division_id', '=', 'infosys.unit.unit_div')
                    ->when($this->employee_id, function ($query) {
                        $query->where('infosys.employee.employee_id', '=', $this->employee_id);
                    })
                    ->when($this->unit_id, function ($query) {
                        $query->where('infosys.employee.unit_unit_id', '=', $this->unit_id);
                    })
                    ->when($this->username, function ($query) {
                        $query->where('users.username', 'like', $this->username . '%');
                    })
                    ->when($this->statusFilter !== '', function ($query) {
                        $query->where('users.status', '=', $this->statusFilter);
                    })
                    ->when($this->roleFilter !== '', function ($query) {
                        $query->where('users.role', '=', $this->roleFilter);
                    })
                    ->orderBy($this->orderBy, $this->orderDirection)
                    ->paginate($this->perPage, ['*'], "usersPage")
            ]
        )->layout("layouts.dashboard");
    }
}

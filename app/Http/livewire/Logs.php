<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Log;
use Livewire\WithPagination;

class Logs extends Component
{
    use WithPagination;

    protected $listeners = ['updateLogsTable'];

    public $perPage = 10;
    public $username = "";
    public $orderDirection = "desc";
    public $orderBy = "created_at";
    public $roleFilter = "";
    public $typeFilter = "";

    public function resetFilter()
    {
        if ($this->roleFilter != "" || $this->typeFilter != "") {
            $this->roleFilter = "";
            $this->typeFilter = "";
        }
    }

    public function updateLogsTable()
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
        $this->resetPage('logsPage');
    }

    public function updated()
    {
        $this->resetPage('logsPage');
    }

    public function render()
    {
        return view(
            'livewire.logs',
            [
                'logs' => Log::with("user")
                    ->whereHas("user", function ($query) {
                        $query->where("username", "like", $this->username . "%")
                            ->when($this->roleFilter !== "", function ($query) {
                                $query->where("role", $this->roleFilter);
                            });
                    })
                    ->when($this->typeFilter !== "", function ($query) {
                        $query->where("type", $this->typeFilter);
                    })->orderBy($this->orderBy, $this->orderDirection)
                    ->paginate($this->perPage, ['*'], "logsPage")
            ]
        )->layout("layouts.dashboard");
    }
}

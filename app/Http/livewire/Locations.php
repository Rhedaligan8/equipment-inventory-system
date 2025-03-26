<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use Livewire\WithPagination;

class Locations extends Component
{
    use WithPagination;

    protected $listeners = ['updateLocationsTable'];

    public $perPage = 10;
    public $name = "";
    public $orderDirection = "desc";
    public $orderBy = "updated_at";
    public $statusFilter = "";

    public function resetFilter()
    {
        if ($this->statusFilter != "") {
            $this->statusFilter = "";
        }
    }

    public function updateLocationsTable()
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
        $this->resetPage('locationsPage');
    }

    public function setLocationId($location_id)
    {
        $this->emit("location_to_edit_id", $location_id);
    }

    public function updated()
    {
        $this->resetPage('locationsPage');
    }

    public function render()
    {
        return view(
            'livewire.locations',
            [
                'locations' => Location::
                    where('name', 'like', $this->name . '%')
                    ->when($this->statusFilter !== "", function ($query) {
                        $query->where('status', $this->statusFilter);
                    })
                    ->orderBy($this->orderBy, $this->orderDirection)
                    ->paginate($this->perPage, ['*'], "locationsPage")
            ]
        )->layout("layouts.dashboard");
    }
}

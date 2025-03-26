<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use App\Models\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class EditLocation extends Component
{

    public $name;
    public $remarks;
    public $status;

    public $location_id = "";

    protected $rules = [
        'name' => 'required|max:255',
    ];

    protected $messages = [
        'name.required' => '*Location name is required.',
        'name.max' => '*Location name too long.',
    ];

    protected $listeners = ["location_to_edit_id" => 'updateLocationId'];


    public function updateLocationId($location_id)
    {
        $location = Location::find($location_id);
        $this->name = $location->name;
        $this->remarks = $location->remarks;
        $this->status = $location->status;
        $this->location_id = $location_id;
    }

    public function updateLocation()
    {
        // force logout user if the role is not admin
        if (Gate::denies('access')) {
            Auth::logout();
            return redirect()->route("login");
        }

        $this->name = trim($this->name);
        $this->remarks = trim($this->remarks);

        $this->validate();

        $location = Location::find($this->location_id);
        $location->remarks = $this->remarks;
        $location->status = $this->status;
        if ($location->isDirty('name')) {
            $location->name = $this->name;
        }
        $location->save();

        if ($location->wasChanged()) {
            $this->emit('trigger-toast', 'Location updated.', 'success');
            $this->emit('updateLocationsTable');

            $statusType = $this->status === 1 ? "Active" : "Inactive";

            $message = "Location updated - location name: {$this->name} - location status: {$statusType} - location remarks: {$this->remarks}";
            Log::create([
                'user_id' => Auth::user()->user_id,
                'type' => 'update',
                'message' => $message,
            ]);
            $this->emit('updateLogsTable');
        }
    }

    public function resetSelected()
    {
        $this->location_id = "";
        $this->name = "";
        $this->remarks = "";
        $this->status = "";
    }

    public function render()
    {
        return view('livewire.edit-location');
    }
}

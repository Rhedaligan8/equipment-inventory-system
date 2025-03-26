<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use App\Models\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AddLocation extends Component
{

    public $name;
    public $remarks;
    public $status = 1;

    protected $rules = [
        'name' => 'required|max:255|unique:icteiis.locations,name',
    ];

    protected $messages = [
        'name.required' => '*Location name is required.',
        'name.unique' => '*Location is already existing.',
        'name.max' => '*Location name too long.',
    ];

    public function create()
    {

        // force logout user if the role is not admin
        if (Gate::denies('access')) {
            Auth::logout();
            return redirect()->route("login");
        }

        $this->name = trim($this->name);
        $this->remarks = trim($this->remarks);

        $this->validate();

        $newLocation = Location::create([
            "name" => $this->name,
            "remarks" => $this->remarks,
            "status" => $this->status,
        ]);

        if ($newLocation) {
            $this->emit('trigger-toast', 'New location created.', 'success');
            $this->emit('updateLocationsTable');

            $message = "New location created - location name: {$this->name}";
            Log::create([
                'user_id' => Auth::user()->user_id,
                'type' => 'create',
                'message' => $message,
            ]);
            $this->emit('updateLogsTable');
        }
        $this->name = "";
        $this->remarks = "";
    }

    public function render()
    {
        return view('livewire.add-location');
    }
}

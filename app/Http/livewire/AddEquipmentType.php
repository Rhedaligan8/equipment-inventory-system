<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EquipmentType;
use App\Models\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AddEquipmentType extends Component
{

    public $name;
    public $description;
    public $status = 1;

    protected $rules = [
        'name' => 'required|max:255|unique:icteiis.equipment_types,name',
    ];

    protected $messages = [
        'name.required' => '*Equipment name is required.',
        'name.unique' => '*Equipment is already existing.',
        'name.max' => '*Equipment name too long.',
    ];

    public function create()
    {

        // force logout user if the role is not admin
        if (Gate::denies('access')) {
            Auth::logout();
            return redirect()->route("login");
        }

        $this->name = trim($this->name);
        $this->description = trim($this->description);

        $this->validate();

        $newEquipmentType = EquipmentType::create([
            "name" => $this->name,
            "description" => $this->description,
            "status" => $this->status,
        ]);

        if ($newEquipmentType) {
            $this->emit('trigger-toast', 'New equipment type created.', 'success');
            $this->emit('updateEquipmentTypesTable');
            $message = "New equipment type created - equipment name: {$this->name}";
            Log::create([
                'user_id' => Auth::user()->user_id,
                'type' => 'create',
                'message' => $message,
            ]);
            $this->emit('updateLogsTable');

        }
        $this->name = "";
        $this->description = "";
    }

    public function render()
    {
        return view('livewire.add-equipment-type');
    }
}

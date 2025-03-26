<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EquipmentType;
use App\Models\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class EditEquipmentType extends Component
{

    public $name;
    public $description;
    public $status;

    public $equipment_type_id = "";

    protected $rules = [
        'name' => 'required|max:255',
    ];

    protected $messages = [
        'name.required' => '*Equipment type name is required.',
        'name.max' => '*Equipment type name too long.',
    ];

    protected $listeners = ["equipment_type_to_edit_id" => 'updateEquipmentTypeId'];


    public function updateEquipmentTypeId($equipment_type_id)
    {
        $equipment_type = EquipmentType::find($equipment_type_id);
        $this->name = $equipment_type->name;
        $this->description = $equipment_type->description;
        $this->status = $equipment_type->status;
        $this->equipment_type_id = $equipment_type_id;
    }

    public function updateEquipmentType()
    {
        // force logout user if the role is not admin
        if (Gate::denies('access')) {
            Auth::logout();
            return redirect()->route("login");
        }

        $this->name = trim($this->name);
        $this->description = trim($this->description);

        $this->validate();

        $equipment_type = EquipmentType::find($this->equipment_type_id);
        $equipment_type->description = $this->description;
        $equipment_type->status = $this->status;
        if ($equipment_type->isDirty('name')) {
            $equipment_type->name = $this->name;
        }
        $equipment_type->save();

        if ($equipment_type->wasChanged()) {
            $this->emit('trigger-toast', 'Equipment type updated.', 'success');
            $this->emit('updateEquipmentTypesTable');

            $statusType = $this->status === 1 ? "Active" : "Inactive";

            $message = "Equipment type updated - Equipment type name: {$this->name} - status: {$statusType} - description: {$this->description}";
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
        $this->equipment_type_id = "";
        $this->name = "";
        $this->description = "";
        $this->status = "";
    }

    public function render()
    {
        return view('livewire.edit-equipment-type');
    }
}

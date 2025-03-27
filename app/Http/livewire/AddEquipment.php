<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Equipment;
use App\Models\Log;
use App\Models\Location;
use App\Models\EquipmentType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AddEquipment extends Component
{

    protected $rules = [
        'employee_id' => 'required',
        'location_id' => 'required',
        'equipment_type_id' => 'required',
        'acquired_date' => 'nullable|date|before_or_equal:today',
    ];

    protected $messages = [
        'employee_id.required' => '*Select person accountable.',
        'location_id.unique' => '*Select equipment location.',
        'equipment_type_id.max' => '*Select equipment type.',
        'acquired_date.date' => '*Select a valid date.',
        'acquired_date.before_or_equal' => '*Future date is not a valid acquisition date.',
    ];

    public $brand;
    public $model;
    public $serial_number;
    public $mr_no;
    public $remarks;
    public $acquired_date;
    // 
    public $employee_name;
    public $employee_id = '';
    public $employees = [];
    // 
    public $location_name;
    public $location_id = '';
    public $locations = [];
    // 
    public $equipment_type_name;
    public $equipment_type_id = '';
    public $equipment_types = [];

    public function fetchEmployees()
    {
        $this->employees = Employee::selectRaw("employee.employee_id, firstname, lastname, CONCAT(lastname, ' ', firstname) as full_name")
            ->whereRaw("CONCAT(lastname, ' ', firstname) LIKE ?", [$this->employee_name . '%'])
            ->limit(20)
            ->get();
    }

    public function updatedEmployeeName()
    {
        $this->fetchEmployees();
        $this->employee_id = '';
    }

    public function setSelectedEmployee($employee)
    {
        $this->employee_name = $employee['full_name'];
        $this->employee_id = $employee['employee_id'];
        $this->resetErrorBag('employee_id');
        $this->fetchEmployees();
    }
    // 
    public function fetchLocations()
    {
        $this->fetchEmployees();
        $this->locations = Location::where("name", "like", $this->location_name . "%")
            ->limit(20)
            ->get();
    }

    public function updatedLocationName()
    {
        $this->fetchLocations();
        $this->location_id = '';
    }

    public function setSelectedLocation($location)
    {
        $this->location_name = $location['name'];
        $this->location_id = $location['location_id'];
        $this->resetErrorBag('location_id');
        $this->fetchLocations();
    }
    // 
    public function fetchEquipmentTypes()
    {
        $this->fetchEmployees();
        $this->equipment_types = EquipmentType::where("name", "like", $this->equipment_type_name . "%")
            ->limit(20)
            ->get();
    }

    public function updatedEquipmentTypeName()
    {
        $this->fetchEquipmentTypes();
        $this->equipment_type_id = '';
    }

    public function setSelectedEquipmentType($equipment_type)
    {
        $this->equipment_type_name = $equipment_type['name'];
        $this->equipment_type_id = $equipment_type['equipment_type_id'];
        $this->resetErrorBag('equipment_type_id');
        $this->fetchEquipmentTypes();
    }

    public function addEquipment()
    {
        // force logout user if the role is not admin
        if (Gate::denies('access')) {
            Auth::logout();
            return redirect()->route("login");
        }

        $this->model = trim($this->model);
        $this->serial_number = trim($this->serial_number);
        $this->mr_no = trim($this->mr_no);
        $this->remarks = trim($this->remarks);
        $this->brand = trim($this->brand);
        try {

            $this->validate();

            $new_euipment = Equipment::create([
                "serial_number" => $this->serial_number,
                "model" => $this->model,
                "mr_no" => $this->mr_no,
                "remarks" => $this->remarks,
                "brand" => $this->brand,
                "acquired_date" => $this->acquired_date,
                "person_accountable_id" => $this->employee_id,
                "equipment_type_id" => $this->equipment_type_id,
                "location_id" => $this->location_id,
                "person_accountable_current_unit_id" => Employee::find($this->employee_id)->first()->unit_unit_id
            ]);

            if ($new_euipment) {
                $this->emit('trigger-toast', 'New equipment created.', 'success');
                $this->emit('updateEquipmentsTable');
                $message = "New equipment created";
                Log::create([
                    'user_id' => Auth::user()->user_id,
                    'type' => 'create',
                    'message' => $message,
                ]);
                $this->emit('updateLogsTable');
            }
            $this->brand = "";
            $this->model = "";
            $this->serial_number = "";
            $this->mr_no = "";
            $this->remarks = "";
            $this->acquired_date = null;
            $this->employee_id = "";
            $this->equipment_type_id = "";
            $this->location_id = "";
            $this->employee_name = "";
            $this->location_name = "";
            $this->equipment_type_name = "";
            $this->fetchData();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->fetchData();
            $this->setErrorBag($e->validator->getMessageBag());
        }
    }

    public function fetchData()
    {
        $this->fetchEmployees();
        $this->fetchEquipmentTypes();
        $this->fetchLocations();
    }

    public function render()
    {
        return view('livewire.add-equipment');
    }
}
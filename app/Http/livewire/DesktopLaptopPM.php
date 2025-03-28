<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit;
use App\Models\Log;
use App\Models\Equipment;
use App\Models\DesktopLaptopPM as DesktopLaptopPMModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DesktopLaptopPM extends Component
{

    public $equipment_id;

    public $equipment;

    // 1. System Boot
    public $system_boot_status_a;
    public $system_boot_remarks_a;
    public $system_boot_status_b;
    public $system_boot_remarks_b;

    // 2. Network Settings
    public $network_settings_status_a;
    public $network_settings_remarks_a;
    public $network_settings_status_b;
    public $network_settings_remarks_b;
    public $network_settings_status_c;
    public $network_settings_remarks_c;
    public $network_settings_status_d;
    public $network_settings_remarks_d;

    // 3. Computer Hardware Settings
    public $computer_hardware_settings_status_a;
    public $computer_hardware_settings_remarks_a;

    // 4. Antivirus
    public $antivirus_status_a;
    public $antivirus_remarks_a;

    // 5. Proper Software Loads
    public $proper_hardware_loads_status_a;
    public $proper_hardware_loads_remarks_a;

    // 6. Operating System Checkup
    public $operating_system_checkup_status_a;
    public $operating_system_checkup_remarks_a;

    // 7. Disk Checkup
    public $disk_checkup_status_a;
    public $disk_checkup_remarks_a;

    // 8. Physical Cleaning
    public $physical_cleaning_status_a;
    public $physical_cleaning_remarks_a;

    // 9. Hardware Inspection
    public $hardware_inspection_status_a;
    public $hardware_inspection_remarks_a;

    // 10. Password Security
    public $password_security_status_a;
    public $password_security_remarks_a;

    // 11. User Accounts
    public $user_accounts_status_a;
    public $user_accounts_remarks_a;

    // 12. Summary
    public $summary_status_a;
    public $summary_remarks_a;

    // additional
    public $position;
    // 

    protected $rules = [
        // 1. System Boot
        'system_boot_status_a' => 'required',
        'system_boot_status_b' => 'required',

        // 2. Network Settings
        'network_settings_status_a' => 'required',
        'network_settings_status_b' => 'required',
        'network_settings_status_c' => 'required',
        'network_settings_status_d' => 'required',

        // 3. Computer Hardware Settings
        'computer_hardware_settings_status_a' => 'required',

        // 4. Antivirus
        'antivirus_status_a' => 'required',

        // 5. Proper Software Loads
        'proper_hardware_loads_status_a' => 'required',

        // 6. Operating System Checkup
        'operating_system_checkup_status_a' => 'required',

        // 7. Disk Checkup
        'disk_checkup_status_a' => 'required',

        // 8. Physical Cleaning
        'physical_cleaning_status_a' => 'required',

        // 9. Hardware Inspection
        'hardware_inspection_status_a' => 'required',

        // 10. Password Security
        'password_security_status_a' => 'required',

        // 11. User Accounts
        'user_accounts_status_a' => 'required',

        // 12. Summary
        'summary_status_a' => 'required',
        // 
        // 'date_conducted' => 'required',
        'position' => 'required',
    ];

    protected $messages = [
        'system_boot_status_a.required' => '*This field is required.',
        'system_boot_status_b.required' => '*This field is required.',
        'network_settings_status_a.required' => '*This field is required.',
        'network_settings_status_b.required' => '*This field is required.',
        'network_settings_status_c.required' => '*This field is required.',
        'network_settings_status_d.required' => '*This field is required.',
        'computer_hardware_settings_status_a.required' => '*This field is required.',
        'antivirus_status_a.required' => '*This field is required.',
        'proper_hardware_loads_status_a.required' => '*This field is required.',
        'operating_system_checkup_status_a.required' => '*This field is required.',
        'disk_checkup_status_a.required' => '*This field is required.',
        'physical_cleaning_status_a.required' => '*This field is required.',
        'hardware_inspection_status_a.required' => '*This field is required.',
        'password_security_status_a.required' => '*This field is required.',
        'user_accounts_status_a.required' => '*This field is required.',
        'summary_status_a.required' => '*This field is required.',
        'summary_status.required' => '*This field is required.',
        'date_conducted.required' => '*This field is required.',
        'unit_id.required' => '*This field is required.',
        'position.required' => '*This field is required.',
        'end_user_verification.max' => '*End user verification too long.',
    ];

    public function submitPM()
    {
        try {
            $this->validate();

            $firstname = $this->equipment->employee->firstname;
            $middlename = $this->equipment->employee->middlename ? $this->equipment->employee->middlename[0] . '.' : '';
            $lastname = $this->equipment->employee->lastname;

            $full_name = $firstname . ' ' . $middlename . ' ' . $lastname;

            $newPmHistory = DesktopLaptopPMModel::create([
                // System Boot
                'system_boot_status_a' => $this->system_boot_status_a,
                'system_boot_remarks_a' => $this->system_boot_remarks_a,
                'system_boot_status_b' => $this->system_boot_status_b,
                'system_boot_remarks_b' => $this->system_boot_remarks_b,

                // Network Settings
                'network_settings_status_a' => $this->network_settings_status_a,
                'network_settings_remarks_a' => $this->network_settings_remarks_a,
                'network_settings_status_b' => $this->network_settings_status_b,
                'network_settings_remarks_b' => $this->network_settings_remarks_b,
                'network_settings_status_c' => $this->network_settings_status_c,
                'network_settings_remarks_c' => $this->network_settings_remarks_c,
                'network_settings_status_d' => $this->network_settings_status_d,
                'network_settings_remarks_d' => $this->network_settings_remarks_d,

                // Computer Hardware Settings
                'computer_hardware_settings_status_a' => $this->computer_hardware_settings_status_a,
                'computer_hardware_settings_remarks_a' => $this->computer_hardware_settings_remarks_a,

                // Antivirus
                'antivirus_status_a' => $this->antivirus_status_a,
                'antivirus_remarks_a' => $this->antivirus_remarks_a,

                // Proper Software Loads
                'proper_hardware_loads_status_a' => $this->proper_hardware_loads_status_a,
                'proper_hardware_loads_remarks_a' => $this->proper_hardware_loads_remarks_a,

                // Operating System Checkup
                'operating_system_checkup_status_a' => $this->operating_system_checkup_status_a,
                'operating_system_checkup_remarks_a' => $this->operating_system_checkup_remarks_a,

                // Disk Checkup
                'disk_checkup_status_a' => $this->disk_checkup_status_a,
                'disk_checkup_remarks_a' => $this->disk_checkup_remarks_a,

                // Physical Cleaning
                'physical_cleaning_status_a' => $this->physical_cleaning_status_a,
                'physical_cleaning_remarks_a' => $this->physical_cleaning_remarks_a,

                // Hardware Inspection
                'hardware_inspection_status_a' => $this->hardware_inspection_status_a,
                'hardware_inspection_remarks_a' => $this->hardware_inspection_remarks_a,

                // Password Security
                'password_security_status_a' => $this->password_security_status_a,
                'password_security_remarks_a' => $this->password_security_remarks_a,

                // User Accounts
                'user_accounts_status_a' => $this->user_accounts_status_a,
                'user_accounts_remarks_a' => $this->user_accounts_remarks_a,

                // Summary
                'summary_status_a' => $this->summary_status_a,
                'summary_remarks_a' => $this->summary_remarks_a,

                // Additional Information
                'position' => $this->position,
                'end_user_verification' => $full_name,
                'unit_id' => $this->equipment->person_accountable_current_unit_id,
                'equipment_id' => $this->equipment_id,
            ]);

            if ($newPmHistory) {
                $this->emit('trigger-toast', 'New Preventive Maintenance created.', 'success');
                $this->emit('updatePreventiveMaintenanceHistoryTable');
                $message = "New preventive maintenance submitted";
                Log::create([
                    'user_id' => Auth::user()->user_id,
                    'type' => 'create',
                    'message' => $message,
                ]);
                $this->emit('updateLogsTable');
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->setErrorBag($e->validator->getMessageBag());
        }
    }

    public function mount($equipment_id)
    {
        $this->equipment_id = $equipment_id;
        $this->equipment = Equipment::select('equipments.*')
            ->join('equipment_types', 'equipment_types.equipment_type_id', '=', 'equipments.equipment_type_id')
            ->join('infosys.employee', 'infosys.employee.employee_id', '=', 'equipments.person_accountable_id')
            ->join('infosys.unit', 'infosys.unit.unit_id', '=', 'equipments.person_accountable_current_unit_id')
            ->join('infosys.division', 'infosys.division.division_id', '=', 'infosys.unit.unit_div')
            ->where("equipments.equipment_id", '=', $equipment_id)
            ->first();
    }

    public function render()
    {
        return view('livewire.desktop-laptop-p-m');
    }
}

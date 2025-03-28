<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class DesktopLaptopPM extends Model
{
    use HasFactory;

    protected $primaryKey = 'desktop_laptop_pm_history_id';
    protected $connection = 'icteiis';
    protected $table = 'desktop_laptop_pm_histories';

    protected $fillable = [
        'equipment_id',
        'unit_id',
        'position',
        'end_user_verification',
        // System Boot
        'system_boot_status_a',
        'system_boot_remarks_a',
        'system_boot_status_b',
        'system_boot_remarks_b',
        // Network Settings
        'network_settings_status_a',
        'network_settings_remarks_a',
        'network_settings_status_b',
        'network_settings_remarks_b',
        'network_settings_status_c',
        'network_settings_remarks_c',
        'network_settings_status_d',
        'network_settings_remarks_d',
        // Computer Hardware Settings
        'computer_hardware_settings_status_a',
        'computer_hardware_settings_remarks_a',
        // Antivirus
        'antivirus_status_a',
        'antivirus_remarks_a',
        // Proper Software Loads
        'proper_hardware_loads_status_a',
        'proper_hardware_loads_remarks_a',
        // Operating System Checkup
        'operating_system_checkup_status_a',
        'operating_system_checkup_remarks_a',
        // Disk Checkup
        'disk_checkup_status_a',
        'disk_checkup_remarks_a',
        // Physical Cleaning
        'physical_cleaning_status_a',
        'physical_cleaning_remarks_a',
        // Hardware Inspection
        'hardware_inspection_status_a',
        'hardware_inspection_remarks_a',
        // Password Security
        'password_security_status_a',
        'password_security_remarks_a',
        // User Accounts
        'user_accounts_status_a',
        'user_accounts_remarks_a',
        // Summary
        'summary_status_a',
        'summary_remarks_a'
    ];

    // Relationships
    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'unit_id');
    }
}
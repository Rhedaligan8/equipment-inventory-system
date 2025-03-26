<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Unit;
use App\Models\EquipmentType;

class Equipment extends Model
{
    use HasFactory;

    protected $connection = 'icteiis';
    protected $table = 'equipments'; // Specify table name if it's not plural

    protected $primaryKey = 'equipment_id'; // Define primary key

    protected $fillable = [
        'equipment_type_id',
        'brand',
        'model',
        'acquired_date',
        'location_id',
        'serial_number',
        'mr_no',
        'person_accountable_id',
        'person_accountable_current_unit_id',
        'remarks',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'acquired_date' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'person_accountable_id', 'employee_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'person_accountable_current_unit_id', 'unit_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

    public function equipment_type()
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_type_id', 'equipment_type_id');
    }

}

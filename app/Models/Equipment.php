<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

}

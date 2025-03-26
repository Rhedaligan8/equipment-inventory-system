<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Division;
use App\Models\Employee;
use App\Models\Equipment;

class Unit extends Model
{
    protected $connection = 'infosys';
    protected $table = 'unit';
    protected $primaryKey = 'unit_id';
    public $timestamps = false;

    public function division()
    {
        return $this->belongsTo(Division::class, 'unit_div', 'division_id');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'unit_unit_id', 'unit_id');
    }

    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'person_accountable_current_unit_id', 'unit_id');
    }
}

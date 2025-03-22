<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Unit;
use App\Models\Division;

class Employee extends Model
{
    protected $connection = 'infosys';
    protected $table = 'employee';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'employee_id', 'employee_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_unit_id', 'unit_id');
    }


    public function division()
    {
        return $this->belongsTo(Division::class, 'division_division_id', 'division_id');
    }
}

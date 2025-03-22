<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Employee;

class Division extends Model
{
    protected $connection = 'infosys';
    protected $table = 'division';
    protected $primaryKey = 'division_id';
    public $timestamps = false;

    public function unit()
    {
        return $this->hasMany(Unit::class, 'unit_div', 'division_id');
    }


    public function employee()
    {
        return $this->hasMany(Employee::class, 'division_division_id', 'division_id');
    }
}

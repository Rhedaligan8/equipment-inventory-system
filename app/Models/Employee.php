<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $connection = 'infosys';
    protected $table = 'employee';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
}

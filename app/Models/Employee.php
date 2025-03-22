<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $connection = 'infosys';
    protected $table = 'division';
    protected $primaryKey = 'division_id';
    public $timestamps = false;
}

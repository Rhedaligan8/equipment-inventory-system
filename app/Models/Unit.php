<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $connection = 'infosys';
    protected $table = 'unit';
    protected $primaryKey = 'unit_id';
    public $timestamps = false;
}

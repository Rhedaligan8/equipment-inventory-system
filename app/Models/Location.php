<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipment;

class Location extends Model
{
    use HasFactory;

    protected $connection = 'icteiis';
    protected $table = 'locations'; // Specify table name if it's not plural

    protected $primaryKey = 'location_id'; // Define primary key

    protected $fillable = [
        'name',
        'remarks',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function equipment()
    {
        return $this->hasMany(Equipment::class, 'location_id', 'location_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    use HasFactory;

    protected $connection = 'icteiis';
    protected $table = 'equipment_types'; // Specify table name if it's not plural

    protected $primaryKey = 'equipment_type_id'; // Define primary key

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function equipment()
    {
        // return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

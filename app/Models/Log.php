<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;
    protected $connection = 'icteiis';
    protected $table = 'logs'; // Specify table name if it's not plural

    protected $primaryKey = 'log_id'; // Define primary key

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'type',
        'message',
        'created_at'
    ];

    protected $casts = [
        'type' => 'string', // Enum stored as string
        'created_at' => 'datetime',
    ];

    /**
     * Relationship: A log belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

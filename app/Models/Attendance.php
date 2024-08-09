<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'arrival_time',
        'departure_time',
    ];

    // Définir la relation avec le modèle Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}


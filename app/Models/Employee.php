<?php

// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        // Ajoutez d'autres attributs selon vos besoins
    ];

    // Relation avec les pointages (attendances)
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}


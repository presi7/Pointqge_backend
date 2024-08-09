<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceController extends Controller
{
    public function recordArrival(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:15',
        ]);

        $attendance = Attendance::create([
            'phone_number' => $request->phone_number,
            'arrival_time' => now(),
        ]);

        return response()->json(['message' => 'Arrival recorded', 'attendance' => $attendance], 200);
    }

    public function recordDeparture(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:15',
        ]);

        $attendance = Attendance::where('phone_number', $request->phone_number)
                                ->whereNull('departure_time')
                                ->first();

        if ($attendance) {
            $attendance->update(['departure_time' => now()]);
            return response()->json(['message' => 'Departure recorded', 'attendance' => $attendance], 200);
        } else {
            return response()->json(['message' => 'No matching arrival found'], 404);
        }
    }

    // Méthode pour récupérer toutes les assiduités
    public function getAttendances()
    {
        $attendances = Attendance::with('employee')->get(); // Charge aussi l'employé associé

        return response()->json($attendances, 200);
    }
}



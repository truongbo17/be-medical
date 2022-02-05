<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function index()
    {
        $currentDate = \Carbon\Carbon::now()->toDateString();

        return Schedule::with(['userName' => function ($query) {
            $query->select('id', 'name');
        }])
            ->with(['medicaldepartmentName' => function ($query) {
                $query->select('id', 'name');
            }])
            ->where('user_id', Auth::user()->id)
            ->where('date', '>', $currentDate)
            ->get();
    }

    public function store(Request $request)
    {
        return Schedule::create([
            'user_id' => Auth::user()->id,
            'doctor_id' => $request->doctor,
            'medicaldepartment_id' => $request->medical_department,
            'date' => $request->date,
            'note' => $request->note,
        ]);
    }


    public function destroy(Schedule $schedule)
    {
        //
    }
}

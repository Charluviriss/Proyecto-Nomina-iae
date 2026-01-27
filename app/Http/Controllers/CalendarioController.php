<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarioController extends Controller
{
    public function index()
    {
        return view('calendarios.calendario_General_de_la_Empresa');
    }

    public function showCalendar(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', Carbon::now()->month);
        
        // Asegurar que el mes y año sean válidos
        if ($month < 1) {
            $month = 12;
            $year--;
        } elseif ($month > 12) {
            $month = 1;
            $year++;
        }

        $date = Carbon::createFromDate($year, $month, 1);
        $daysInMonth = $date->daysInMonth;
        $startDayOfWeek = $date->dayOfWeekIso; // 1 (Monday) to 7 (Sunday)

        return view('calendarios.ver_calendario', compact('year', 'month', 'daysInMonth', 'startDayOfWeek', 'date'));
    }

    public function feriados()
    {
        return view('calendarios.feriados');
    }

    public function personal()
    {
        return view('calendarios.calendario_por_personal');
    }
}

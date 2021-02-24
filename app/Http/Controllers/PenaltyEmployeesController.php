<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penalty;
use App\Models\Decision;
use App\Models\PenaltyEmployee;
use Illuminate\Support\Facades\DB;

class PenaltyEmployeesController extends Controller
{
    public function show(Decision $decision)
    {
        $decision = Decision::find($decision->id);

        $employees = DB::table('penalty_employees')->where('decision_id', $decision->id)
        ->join('employees','employees.id','penalty_employees.employee_id')
        ->get();

        return view('decisions.show', compact('employees','decision'));
    }
}

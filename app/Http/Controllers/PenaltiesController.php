<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenaltiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $penalties = DB::table('penalties')
        ->join('penalty_employees','penalty_employees.penalty_id','penalties.id')
        ->join('employees','employees.id','penalty_employees.employee_id')
        ->join('decisions','penalties.decision_id','decisions.id')
        ->select('decisions.judgement_number','decisions.decision_number','decisions.decision_date','employees.name','employees.title','penalties.penalty_reason','penalties.penalty','penalty_employees.execution_date','decisions.issuing_authority')
        ->get();

        //$penalties = json_decode($data);

        return view('penalties.index', compact('penalties'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penalty = new Penalty();

        return view('penalties.create', compact('penalty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function show(Penalty $penalty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function edit(Penalty $penalty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penalty $penalty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penalty $penalty)
    {
        //
    }
}
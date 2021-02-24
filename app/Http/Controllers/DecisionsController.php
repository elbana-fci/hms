<?php

namespace App\Http\Controllers;

use App\Models\Decision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddDecisionRequest;

class DecisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $decisions = DB::table('decisions')->get();
        return view('decisions.index', compact('decisions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $decision = new Decision();

        return view('decisions.create', compact('decision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddDecisionRequest $request)
    {
        
        $decision = $request->user()->decisions()->create($request->all());
        
        if($request->expectsJson()){
            return response()->json([
                'message' => "Success",
                'decision' => $decision
            ]);
        }

        //return redirect()->route('decisions.index')->with('success', 'Your data has been submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function show(Decision $decision)
    {
        $decision = Decision::find($decision->id);

        $employees = DB::table('penalty_employees')->where('decision_id', $decision->id)
        ->join('employees','employees.id','penalty_employees.employee_id')
        ->select('employees.name','employees.title','employees.degree','employee_id')->distinct('employee_id')
        ->get();

        //return $employees;
        return view('decisions.show', compact('employees','decision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function edit(Decision $decision)
    {
        $decision = Decision::find($decision->id);
        return view('decisions.edit', compact('decision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Decision $decision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decision $decision)
    {
        //
    }

}

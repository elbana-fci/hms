<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use App\Models\Decision;
use App\Models\PenaltyEmployee;
use Illuminate\Http\Request;
use App\Http\Requests\AddPenaltyRequest;
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
        $penalties = Penalty::All();

        return view('penalties.index', compact('penalties'));

        //retrive name only
        
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
    public function store(AddPenaltyRequest $request)
    {
        $decision_id = $request->input('decision_id');
        $penalty_id = $request->input('penalty');
        $empIDs = $request->input('empIDs');

        if(!empty($decision_id)) {
            $decision = Decision::find($decision_id);
            $decision->penalties()->attach($penalty_id);

            if(!empty($empIDs)) {
                foreach ($empIDs as $id) {
                    $flight = PenaltyEmployee::create(
                        ['decision_id' => $decision_id, 'penalty_id' => $penalty_id, 'employee_id' => $id]
                    );
                }
            }
        }else {

            $request->user()->penalties()->create($request->only('penalty', 'penalty_reason'));
            return redirect()->route('penalties.index')->with('success', 'Your data has been submitted');
        }
        
        
    }

    /*public function getPenaltiesByDecision(){
        $penalties = new Penalty::all();
        if($request->expectsJson()){
            return response()->json([
                'message' => "Success",
                'penalties' => $penalties
            ]);
        }
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function show(Penalty $penalty)
    {
        /*$decn = 71;
        $id = 1;
        $employeesInDecision = DB::table('decision_employees')->select('employee_id')->where('decision_id', $decn)->get();

        $IDs = array();
        foreach ($employeesInDecision as $emp) {
            array_push($IDs, $emp->employee_id);
        }

        if(!in_array($id, $IDs)){
            echo "not exist";
        } else{echo "exist";}*/

        //$decision_id = 2;

        /*$PenEmp = DB::table('penalties')
        ->join('penalty_employees', 'penalty_employees.penalty_id', 'penalties.id')->where('decision_id', $decision_id)
        ->join('employees', 'employees.id', 'penalty_employees.employee_id')
        ->select('penalties.id', 'penalties.penalty', 'employees.name')
        ->get()->groupBy('penalty');*/

        /*$PenEmp = DB::table('decision_penalties')->where('decision_id', $decision_id)
                        ->join('penalties','penalties.id','decision_penalties.penalty_id')
                        ->join('penalty_employees','penalty_employees.penalty_id','penalties.id')
                        ->join('employees','employees.id','penalty_employees.employee_id')
                        ->select('penalties.id','penalties.penalty',DB::raw('employees.id as emp_id'),'employees.name')
                        ->get();*/
        $PenEmp = DecisionPenalty::where('decision_id', 4)->get();
        return $PenEmp;
    }

    public function getPenaltiesByDecID($id)
    {
        $penalties = DB::table('decision_penalties')->where('decision_id', $id)
                        ->join('penalties','penalties.id','decision_penalties.penalty_id')
                        ->get();

     
            return response()->json([
                'message' => "Success",
                'penalties' => $penalties
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function edit(Penalty $penalty)
    {
        $penalty = Penalty::find($penalty->id);
        return view('penalties.edit', compact('penalty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function update(AddPenaltyRequest $request, Penalty $penalty)
    {
        
        $decision_id = $request->input('decision_id');
        $penalty_id = $request->input('penalty');
        $empIDs = $request->input('empIDs');

        if(!empty($decision_id)) {
            if(!empty($empIDs)) {
                foreach ($empIDs as $id) {
                    $flight = PenaltyEmployee::updateOrCreate(
                        ['decision_id' => $decision_id, 'penalty_id' => $penalty_id, 'employee_id' => $id],
                        ['employee_id' => $id]
                    );
                }
            }
        }

        else {
            $penalty->update($request->all());
            return redirect()->route('penalties.index')->with('success', 'Your data has been updated');
        }
        
    }

    public function getAllPenalties()
    {
        $penalties = Penalty::All();

        return $penalties;

        //retrive name only
    }

    public function PenaltyRecords()
    {
        $penalties = DB::table('penalties')
        ->join('penalty_employees','penalty_employees.penalty_id','penalties.id')
        ->join('employees','employees.id','penalty_employees.employee_id')
        ->join('decisions','decisions.id','penalty_employees.decision_id')
        ->select('decisions.judgement_number','decisions.decision_number','decisions.decision_date','employees.name','employees.title','penalties.penalty_reason','penalties.penalty','penalty_employees.execution_date','decisions.issuing_authority')
        ->get();

        //$penalties = json_decode($data);

        return view('penalties.penaltyRecords', compact('penalties'));
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

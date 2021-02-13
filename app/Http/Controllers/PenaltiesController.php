<?php

namespace App\Http\Controllers;

use App\Models\Penalty;
use App\Models\Decision;
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
    public function store(AddPenaltyRequest $request)
    {
        
        $penalty = $request->user()->penalties()->create($request->except(['empIDs']));

        $empIDs = $request->input('empIDs');
        $decision_id = $request->input('decision_id');

        $employeesInDecision = DB::table('decision_employees')->select('employee_id')->where('decision_id', $decision_id)->get();

        $empIDsArray = array();
        foreach ($employeesInDecision as $emp) {
            array_push($empIDsArray, $emp->employee_id);
        }

        $decision = Decision::find($decision_id);

        $diff = array_diff($empIDs, $empIDsArray);
        if(!empty($diff)){
            $decision->employees()->attach($diff);
        }

        $penalty->employees()->attach($empIDs);

        /*$gulty = DB::table('employees')
                    ->whereIn('id', $empIDs)
                    ->get();*/

        $PenEmp = Penalty::find($penalty->id)->employees;


        if($request->expectsJson()){
            return response()->json([
                'message' => "Success",
                'penalty' => $penalty,
                'PenEmp' => $PenEmp
            ]);
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

        $decision_id = 1;

        $PenEmp = DB::table('penalties')
        ->join('penalty_employees', 'penalty_employees.penalty_id', 'penalties.id')->where('decision_id', $decision_id)
        ->join('employees', 'employees.id', 'penalty_employees.employee_id')
        ->select('penalties.id', 'penalties.penalty', 'employees.name')
        ->get()->groupBy('penalty');

        return $PenEmp;
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

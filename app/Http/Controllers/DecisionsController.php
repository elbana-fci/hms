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

    public function getAllDecisions()
    {
        $decisions = Decision::All();
        //return view('decisions.index', compact('decisions'));

        return $decisions;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decision  $decision
     * @return \Illuminate\Http\Response
     */
    public function edit(Decision $decision)
    {
        //
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

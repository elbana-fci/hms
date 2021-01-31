<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\AddEmployeeRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);

        //return $employees;

        return view('employees.index', compact('employees'));
    }

    public function getAllEmployees()
    {
        $employees = Employee::All();

        return $employees;

        //retrive name only
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();

        return view('employees.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEmployeeRequest $request)
    {

        $employee = $request->user()->employees()->create($request->except(['decision_id']));

        $decision_id = $request->input('decision_id');

        $employee->decisions()->attach($decision_id);

        if($request->expectsJson()){
            return response()->json([
                'message' => "Success",
                'employee' => $employee
            ]);
        }

        //return redirect()->route('employees.index')->with('success', 'Your data has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $penalties = Employee::find($employee->id)->penalties;

        return view('employees.show', compact('employee', 'penalties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ $employee->name }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">Back to all Employee</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">issuing_authority</th>
                                <th scope="col">Judge #</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Penalty</th>
                                <th scope="col">Exec. Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penalties as $penalty)
                                <tr>
                                    <th scope="row">1</th>
                                    <td><a href="">{{ $penalty->issuing_authority }}</a></td>
                                    <td>{{ $penalty->judgement_number }}</td>
                                    <td>{{ $penalty->penalty_reason }}</td>
                                    <td>{{ $penalty->penalty }}</td>
                                    <td>{{ $penalty->execution_date }}</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <a href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            <h5>Penalties: {{ count($penalties) }}</h5>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
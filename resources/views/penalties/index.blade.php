@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('All Penalties') }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('penalties.create') }}" class="btn btn-outline-secondary">Add Penalty</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    <div class="media">
                        <div class="media-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judgement#</th>
                                    <th scope="col">Decision#</th>
                                    <th scope="col">Decision Date</th>
                                    <th scope="col">Gulity</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Penalty Reason</th>
                                    <th scope="col">Penalty</th>
                                    <th scope="col">Exec Date</th>
                                    <th scope="col">Issuing Authority</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penalties as $penalty)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $penalty->judgement_number }}</td>
                                        <td>{{ $penalty->decision_number }}</td>
                                        <td>{{ $penalty->decision_date }}</td>
                                        <td>{{ $penalty->name }}</td>
                                        <td>{{ $penalty->title }}</td>
                                        <td>{{ $penalty->penalty_reason }}</td>
                                        <td>{{ $penalty->penalty }}</td>
                                        <td>{{ $penalty->execution_date }}</td>
                                        <td>{{ $penalty->issuing_authority }}</td>
                                        <td>
                                            <a href="">Edit</a>
                                            <a href="">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
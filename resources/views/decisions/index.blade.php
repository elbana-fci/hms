@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('Decisions') }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('decisions.create') }}" class="btn btn-outline-secondary">Add Decision</a>
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
                                    <th scope="col">ID</th>
                                    <th scope="col">decisions#</th>
                                    <th scope="col">Judgement#</th>
                                    <th scope="col">Decision Date</th>
                                    <th scope="col">Issuing Authority</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($decisions as $decision)
                                    <tr>
                                        <th scope="row">{{ $decision->id }}</th>
                                        <td>{{ $decision->decision_number }}</td>
                                        <td>{{ $decision->judgement_number }}</td>
                                        <td>{{ $decision->decision_date }}</td>
                                        <td>{{ $decision->issuing_authority }}</td>
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
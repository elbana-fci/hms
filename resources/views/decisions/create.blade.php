@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('Add Decision') }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">Back to all Decisions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('decisions.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="decision-number">Decision Number</label>
                            <input type="number" min="0" max="4294967295" name="decision_number" id="decision-number" class="form-control {{ $errors->has('decision_number') ? 'is-invalid' : '' }}">

                            @if($errors->has('decision_number'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('decision_number') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="judgement-number">Judgement Number</label>
                            <input type="number" min="0" max="4294967295" name="judgement_number" id="judgement-number" class="form-control {{ $errors->has('judgement_number') ? 'is-invalid' : '' }}">

                            @if($errors->has('judgement_number'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('judgement_number') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="decision-date">Decision Date</label>
                            <input type="date" min="0" max="4294967295" name="decision_date" id="decision-date" class="form-control {{ $errors->has('decision_date') ? 'is-invalid' : '' }}">

                            @if($errors->has('decision_date'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('decision_date') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            @php 
                                $issuing_authority = array('Hospital','Government', 'Department');
                            @endphp
                            <label for="issuing-authority">Issuing Authority</label>
                            <select name="issuing_authority" id="issuing-authority" class="form-control {{ $errors->has('issuing_authority') ? 'is-invalid' : '' }}">
                                @foreach($issuing_authority as $authority)
                                    <option value="{{ $authority }}">{{ $authority }}</option>
                                @endforeach
                            </select>

                            @if($errors->has('issuing_authority'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('issuing_authority') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Create Decision</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
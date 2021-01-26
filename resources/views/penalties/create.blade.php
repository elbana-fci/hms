@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('Add Penalty') }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('penalties.index') }}" class="btn btn-outline-secondary">Back to all Penalties</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('penalties.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="penalty">Penalty</label>
                            <input type="text" name="penalty" id="penalty" class="form-control {{ $errors->has('penalty') ? 'is-invalid' : '' }}">

                            @if($errors->has('penalty'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('penalty') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="penalty-reason">Penalty Reason</label>
                            <input type="text" name="penalty_reason" id="penalty-reason" class="form-control {{ $errors->has('penalty_reason') ? 'is-invalid' : '' }}">

                            @if($errors->has('penalty_reason'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('penalty_reason') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="decision-id">Decision id</label>
                            <input type="number" name="decision_id" id="decision-id" class="form-control {{ $errors->has('decision_id') ? 'is-invalid' : '' }}">

                            @if($errors->has('decision_id'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('decision_id') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Add Penalty</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
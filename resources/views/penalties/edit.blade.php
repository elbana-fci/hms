@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('pen.edit-btn') }}</h2>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('penalties.update', $penalty->id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="penalty">{{ __('pen.penalty') }}</label>
                            <input type="text" name="penalty" id="penalty" value="{{ old('penalty', $penalty->penalty) }}" class="form-control {{ $errors->has('penalty') ? 'is-invalid' : '' }}">

                            @if($errors->has('penalty'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('penalty') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="penalty-reason">{{ __('pen.penalty-reason') }}</label>
                            <input type="text" name="penalty_reason" id="penalty-reason" value="{{ old('penalty_reason', $penalty->penalty_reason) }}" class="form-control {{ $errors->has('penalty_reason') ? 'is-invalid' : '' }}">

                            @if($errors->has('penalty_reason'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('penalty_reason') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">{{ __('pen.edit-btn') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
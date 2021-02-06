@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('Edit Employee') }}</h2>
                        <div class="ml-auto">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">Back to all Employee</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('employees.update', $employee->id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="employee-name">Name</label>
                            <input type="text" name="name" id="employee-name" value="{{ old('name', $employee->name) }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">

                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            @php 
                                $titles = array('Doctor','Pharmacist', 'Employee');
                            @endphp
                            <label for="employee-title">Title</label>
                            <select name="title" id="employee-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                @foreach($titles as $title)
                                    <option value="{{ $title }}">{{ $title }}</option>
                                @endforeach
                            </select>

                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            @php 
                                $degrees = array('First','Second', 'Third', 'Forth', 'Fifth');
                            @endphp
                            <label for="employee-degree">Degree</label>
                            <select name="degree" id="employee-degree" class="form-control {{ $errors->has('degree') ? 'is-invalid' : '' }}">
                                @foreach($degrees as $degree)
                                    <option value="{{ $degree }}">{{ $degree }}</option>
                                @endforeach
                            </select>

                            @if($errors->has('degree'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('degree') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Edit Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
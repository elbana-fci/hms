@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('emp.create-emp') }}</h2>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="employee-name">{{ __('emp.name') }}</label>
                            <input type="text" name="name" id="employee-name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">

                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            @php 
                                $titles = array('صيدلي','طبيب بشري','طبيب أسنان','ممارس علاج طبيعي','ممرضة','أخصائي تمريض','فني أشعة','فني معمل','فني احصاء','موظف');
                            @endphp
                            <label for="employee-title">{{ __('emp.title') }}</label>
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
                                $degrees = array('أولى','ثانية', 'ثالثة', 'رابعة', 'خامسة');
                            @endphp
                            <label for="employee-degree">{{ __('emp.degree') }}</label>
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
                            <button type="submit" class="btn btn-primary dark-blue btn-lg">{{ __('emp.add-btn') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
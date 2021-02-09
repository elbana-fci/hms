@extends('layouts.app')

@section('content')
<div class="container emp-records">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center"><h1>ﺻﺤﻴﻔﺔ ﺟﺰاءاﺕ</h1></div>
        <div class="col-md-12"><p class="title">محافظة الفيوم <br/>مديرية الشئون الصحية <br/>مستشفى طامية المركزي</p><hr/></div>
        <div class="col-md-6"><p class="emp-name">اﻻﺳﻢ : {{ $employee->name }}</p></div>
        <div class="col-md-6"><p class="emp-title">اﻟﻮﻇﻴﻔﺔ : {{ $employee->title }}</p></div>
        <div class="col-md-12">
                  
        <table class="table table-bordered table-dir">
            <thead>
                <tr>
                    <th scope="col">{{ __('emp.issuing_authority') }}</th>
                    <th scope="col">{{ __('emp.decision_number') }}</th>
                    <th scope="col">{{ __('emp.decision_date') }}</th>
                    <th scope="col">{{ __('emp.reason') }}</th>
                    <th scope="col">{{ __('emp.penalty') }}</th>
                    <th scope="col">{{ __('emp.execution_date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penalties as $penalty)
                    <tr>
                        <td>{{ $penalty->issuing_authority }}</td>
                        <td>{{ $penalty->decision_number }}</td>
                        <td>{{ $penalty->decision_date }}</td>
                        <td>{{ $penalty->penalty_reason }}</td>
                        <td>{{ $penalty->penalty }}</td>
                        <td>{{ $penalty->execution_date }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th>{{ __('emp.total') }}</th>
                    <td colspan="5">{{ count($penalties) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 employees">
            <div class="top-wrap">
                <h2 class="main-heading">{{ __('emp.All-Employees') }}</h2>
                <a href="{{ route('employees.create') }}" class="btn btn-primary dark-blue mr-auto">{{ __('emp.add-btn') }}<i class="fas fa-user-plus"></i></a>
            </div>
            @include('layouts._messages')
            <table class="table table-bordered table-dir">
                <thead>
                    <tr>
                        <th scope="col">{{ __('emp.serial') }}</th>
                        <th scope="col">{{ __('emp.name') }}</th>
                        <th scope="col">{{ __('emp.degree') }}</th>
                        <th scope="col">{{ __('emp.title') }}</th>
                        <th scope="col">{{ __('emp.created_at') }}</th>
                        <th scope="col">{{ __('emp.control') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td><a href="{{ route('employeeRecords', $employee->id) }}">{{ $employee->name }}</a></td>
                            <td>{{ $employee->degree }}</td>
                            <td>{{ $employee->title }}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td class="control-icons">
                                <a href="{{ route('employees.edit', $employee->id) }}"><i class="fas fa-pen"></i></a>
                                <a href=""><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>
    </div>
</div>
@endsection
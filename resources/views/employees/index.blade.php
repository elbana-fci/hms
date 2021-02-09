@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 employees">
            <div class="top-wrap">
                <h2 class="">{{ __('emp.All-Employees') }}</h2>
                <a href="{{ route('employees.create') }}" class="btn btn-primary mr-auto">{{ __('emp.add-btn') }}</a>
            </div>
            <div class="card">
                <div class="card-body">
                    @include('layouts._messages')
                    <div class="media">
                        <div class="media-body">
                        <table class="table table-striped table-dir">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('emp.name') }}</th>
                                    <th scope="col">{{ __('emp.degree') }}</th>
                                    <th scope="col">{{ __('emp.title') }}</th>
                                    <th scope="col">{{ __('emp.control') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach($employees as $employee)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td><a href="{{ route('employeeRecords', $employee->id) }}">{{ $employee->name }}</a></td>
                                        <td>{{ $employee->degree }}</td>
                                        <td>{{ $employee->title }}</td>
                                        <td>
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">{{ __('emp.edit-btn') }}</a>
                                            <a href="" class="btn btn-sm btn-danger">{{ __('emp.delete-btn') }}</a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                                <!--{{ $employees->links() }}-->
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
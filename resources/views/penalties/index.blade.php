@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 penalties">
            <h2>{{ __('pen.penalties') }}</h2>
            <div class="card">
                <div class="card-body">
                    @include('layouts._messages')
                    <div class="media">
                        <div class="media-body">
                        <table class="table table-striped table-dir">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('pen.serial-number') }}</th>
                                    <th scope="col">{{ __('pen.judgement-number') }}</th>
                                    <th scope="col">{{ __('pen.decision-number') }}</th>
                                    <th scope="col">{{ __('pen.decision-date') }}</th>
                                    <th scope="col">{{ __('pen.gulty-name') }}</th>
                                    <th scope="col">{{ __('pen.gulty-title') }}</th>
                                    <th scope="col">{{ __('pen.penalty-reason') }}</th>
                                    <th scope="col">{{ __('pen.penalty') }}</th>
                                    <th scope="col">{{ __('pen.execution-date') }}</th>
                                    <th scope="col">{{ __('pen.issuing-authority') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach($penalties as $penalty)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $penalty->judgement_number }}</td>
                                        <td>{{ $penalty->decision_number }}</td>
                                        <td>{{ $penalty->decision_date }}</td>
                                        <td>{{ $penalty->name }}</td>
                                        <td>{{ $penalty->title }}</td>
                                        <td>{{ $penalty->penalty_reason }}</td>
                                        <td>{{ $penalty->penalty }}</td>
                                        <td>{{ $penalty->execution_date }}</td>
                                        <td>{{ $penalty->issuing_authority }}</td>
                                    </tr>
                                    <?php $i++ ?>
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
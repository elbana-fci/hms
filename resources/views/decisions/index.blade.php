@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ __('dec.decisions') }}</h2>
                        <div class="item-dir">
                            <a href="{{ route('decisions.create') }}" class="btn btn-outline-secondary">{{ __('dec.add-btn') }}</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    <div class="media">
                        <div class="media-body">
                        <table class="table table-striped table-dir">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('dec.serial-number') }}</th>
                                    <th scope="col">{{ __('dec.decision-number') }}</th>
                                    <th scope="col">{{ __('dec.judgement-number') }}</th>
                                    <th scope="col">{{ __('dec.decision-date') }}</th>
                                    <th scope="col">{{ __('dec.issuing-authority') }}</th>
                                    <th scope="col">{{ __('dec.control') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach($decisions as $decision)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $decision->decision_number }}</td>
                                        <td>{{ $decision->judgement_number }}</td>
                                        <td>{{ $decision->decision_date }}</td>
                                        <td>{{ $decision->issuing_authority }}</td>
                                        <td>
                                            <a href="">Edit</a>
                                            <a href="">Delete</a>
                                        </td>
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
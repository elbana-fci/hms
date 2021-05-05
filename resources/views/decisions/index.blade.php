@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="top-wrap">
                <h2 class="main-heading">{{ __('dec.decisions') }}</h2>
                <a href="{{ route('decisions.create') }}" class="btn btn-primary dark-blue mr-auto">{{ __('dec.add-btn') }}</a>
            </div>
            @include('layouts._messages')
            <table class="table table-bordered table-dir">
                <thead>
                    <tr>
                        <th scope="col">{{ __('dec.serial-number') }}</th>
                        <th scope="col">{{ __('dec.decision-number') }}</th>
                        <th scope="col">{{ __('dec.judgement-number') }}</th>
                        <th scope="col">{{ __('dec.decision-date') }}</th>
                        <th scope="col">{{ __('dec.issuing-authority') }}</th>
                        <th scope="col">{{ __('dec.stamp') }}</th>
                        <th scope="col">{{ __('dec.created_at') }}</th>
                        <th scope="col">{{ __('dec.control') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($decisions as $decision)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $decision->decision_number }}</td>
                            <td>{{ $decision->judgement_number }}</td>
                            <td>{{ $decision->decision_date }}</td>
                            <td>{{ $decision->issuing_authority }}</td>
                                @if($decision->issuing_authority == "Hospital" || $decision->issuing_authority == "المستشفى")
                                <td><a href="{{ route('decisions.show', $decision->id) }}">{{ __('dec.show-btn') }}</a></td>
                                @else
                                <td>{{ __('dec.not_available') }}</td>
                                @endif
                                <td>{{ $decision->created_at }}</td>
                            <td class="control-icons">
                                <a href="{{ route('decisions.edit', $decision->id) }}"><i class="fas fa-pen"></i></a>
                                <a href=""><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            {{ $decisions->links() }}
        </div>
    </div>
</div>
@endsection
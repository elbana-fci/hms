@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 penalties">
            <h2>{{ __('pen.penalties') }}</h2>
            @include('layouts._messages')
            <table class="table table-bordered table-dir">
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
                            <td>
                                @if($penalty->execution_date)
                                    {{ $penalty->execution_date }}
                                @else
                                    <a data-toggle="modal" data-target="#exampleModal" class="btn-exec">
                                      {{ __('pen.execute') }}
                                    </a>
                                @endif
                            </td>
                            <td>{{ $penalty->issuing_authority }}</td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            {{ $penalties->links() }}        
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $penalty->penalty }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
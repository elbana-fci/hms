@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 penalties">
            <div class="top-wrap">
                <h2 class="main-heading">{{ __('pen.penalties') }}</h2>
                <a href="{{ route('penalties.create') }}" class="btn btn-primary dark-blue mr-auto">{{ __('pen.add-btn') }}<i class="fas fa-user-plus"></i></a>
            </div>

            @include('layouts._messages')

            <table class="table table-bordered table-dir">
                <thead>
                    <tr>
                        <th scope="col">{{ __('pen.serial-number') }}</th>
                        <th scope="col">{{ __('pen.penalty-reason') }}</th>
                        <th scope="col">{{ __('pen.penalty') }}</th>
                        <th scope="col">{{ __('pen.created_at') }}</th>
                        <th scope="col">{{ __('pen.control') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($penalties as $penalty)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $penalty->penalty_reason }}</td>
                            <td>{{ $penalty->penalty }}</td>
                            <td>{{ $penalty->created_at }}</td>
                            <td>
                                <a href="{{ route('penalties.edit', $penalty->id) }}"><i class="fas fa-pen"></i></a>
                                <a href=""><i class="fas fa-trash-alt"></i></a>
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
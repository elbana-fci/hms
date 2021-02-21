@extends('layouts.app')

@section('content')
<div class="container">
    <editdecision :decision="{{$decision}}" inline-template>
    </editdecision>
</div>
@endsection

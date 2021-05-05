@extends('layouts.app')

@section('content')
<div class="container">
    <editdecision :decision="{{$decision}}">
    </editdecision>
</div>
@endsection

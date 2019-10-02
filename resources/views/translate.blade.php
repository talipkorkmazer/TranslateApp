@extends('layouts.app')

@section('content')
    @if($status == true)
        <h2 class="is-size-3">{!! $text !!}</h2>
    @else
        <h2 class="is-size-3">{{$message}}</h2>
    @endif
@endsection

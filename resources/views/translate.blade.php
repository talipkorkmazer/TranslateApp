@extends('layouts.app')

@section('content')
    @if($status == true)
        <h2 class="is-size-3 has-text-centered">{!! $text !!}</h2>
    @else
        <h2 class="is-size-3">{{$message}}</h2>
    @endif
    <a href="/">Go Back</a>
@endsection


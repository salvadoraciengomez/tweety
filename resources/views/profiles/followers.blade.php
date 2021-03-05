@extends('layouts.app')

@section('content')
    <h2>Seguidores:</h2>

    @foreach (auth()->user()->followers() as $seguidor)
        {{$seguidor->username}}
        <br>
    @endforeach
@endsection

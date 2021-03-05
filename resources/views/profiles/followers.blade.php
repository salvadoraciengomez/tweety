@extends('layouts.app')

@section('content')
    <h2>Seguidores:</h2>

    @foreach (auth()->user()->followers() as $seguidor)
    <img src="{{ $user->avatar }}" alt="" width="40" height="40" class="rounded-full mr-4">
        <a href="/profiles/{{$seguidor->username}}">{{$seguidor->username}}</a>
        <br>
    @endforeach
@endsection

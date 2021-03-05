@extends('layouts.app')
@section('content')
    

    <table><td>
        @foreach($todos as $usuario)
            <tr>{{$usuario->username}}</tr>
        @endforeach
    </td></table>

@endsection
@extends('layouts.app')
@section('content')
    

    <table><td>
        {{ $i=0 }}
        @foreach($todos as $user)
            <?php $i++;?>
            <tr>Usuario {{$i.':'}}<a href="{{'/profiles/'.$user->username}}">{{$user->username}}</a></tr><br>
        @endforeach
    </td></table>

@endsection
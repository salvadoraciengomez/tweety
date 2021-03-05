@extends('layouts.app')
@section('content')
    

    <table><td>
        {{ $i=0 }}
        @foreach($users as $user)
            <?php $i++;?>
            <tr>
                Usuario {{$i.':'}}<a href="{{'/profiles/'.$user->username}}">{{$user->username}}</a>
                <img src="{{ $user->avatar }}" width="40" height="40" class="rounded-full mr-4">
            </tr>
            <br>
        @endforeach
    </td></table>

@endsection
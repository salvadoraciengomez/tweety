@extends('layouts.app')

@section('content')
    {{-- <h3>profile page for {{ $user->name }}</h3>
    <hr> --}}
    <header class="mb-6">
        <img src="/images/bio.png" alt="" class="mb-2">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                <a href="" class="rounded-full shadow py-2 px-4 text-black text-xs">Edit Profile</a>
                <form method="POST" action="/profiles/{{ $user->name }}/follow">
                    @csrf
                    <button type="submit" class="bg-blue-500 rounded-full shadow px-4 py-2 text-white text-xs">Follow Me</button>
                </form>
            </div>
        </div>
        <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi cum nesciunt, quae distinctio et incidunt amet odio? Nam perspiciatis earum ratione veniam illo, cupiditate fugit? Cumque ratione cupiditate recusandae tempore.</p>
        <img src="{{ $user->avatar }}" alt="" class="rounded-full mr-2 absolute" style="width:150px;top:47%;left:calc(45%);top:215px">
    </header>
    @include('_timeline',[
        'tweets' => $user->tweets
    ])
@endsection

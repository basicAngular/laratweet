@extends('layouts.app')

@section('content')
<div class="container">
    <div id="root"></div>
    <h2>Following</h2>
    @foreach ($following as $user)
        <img src="{{$user->avatar}}" alt="">
        <a href="{{route('users', $user)}}"><p> {{$user->username}}</p></a>
    @endforeach

    <h2>Followers</h2>
    @foreach ($followers as $user)
        <img src="{{$user->avatar}}" alt="">
        <a href="{{route('users',$user)}}"> {{$user->username}} </a>
    @endforeach
</div>
@endsection

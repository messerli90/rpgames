@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Favorites List <small>{{ $user ? $user->name : 'No user selected'}}</small></h1>
        </div>

        @if($user)
            @if(count($favorites))
                <ul class="list-group">
                    @foreach ($favorites as $favorite)
                        <li class="list-group-item">{{ $favorite->favoritable->title }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-center">
                    <em>User has no favorites.</em>
                </p>
            @endif
        @else
            <p class="text-center">
                <em>No user selected</em>
            </p>
        @endif
    </div>
@endsection

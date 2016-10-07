@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{-- <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <a href="{{ route('challenges.create') }}" class="btn btn-primary">Create a new Challenge</a>
            </div>
        </div> --}}

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('challenges.create') }}" class="pull-right">Create a new Challenge</a>
                Your Challenges
            </div>

            <div class="panel-body">
                @if(!count($challenges))
                    <em>No challenges created yet.</em>
                @else
                    <ul class="list-group">
                        @foreach($challenges as $challenge)
                            <li class="list-group-item">
                                <div class="pull-right challenge-list-meta">
                                    <span><i class="fa fa-fw fa-eye"></i> {{ $challenge->views }}</span>
                                    <span><i class="fa fa-fw fa-star"></i> {{ $challenge->reviews()->count() }}</span>
                                    <span><a href="{{ route('challenges.edit', $challenge) }}" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-fw fa-edit"></i></a></span>
                                </div>
                                <a href="{{ route('challenges.show', $challenge) }}">{{ $challenge->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                    {{-- <em>Thank you for contributing</em> --}}
                @endif
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('challenges.index') }}" class="pull-right">Find more Challenges</a>
                Saved Challenges
            </div>

            <div class="panel-body">
                @if(!count($favorites))
                    <em>No challenges saved yet.</em>
                @else
                    <ul class="list-group">
                        @foreach($favorites as $favorite)
                            <li class="list-group-item">
                                <a href="{{ route('challenges.show', $favorite->favoritable) }}">
                                    <span class="pull-right text-muted">{{ $favorite->favoritable->game->title }}</span>
                                    {{ $favorite->favoritable->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="panel-footer">
                <a href="{{ route('favorites.index') }}?user_id={{ auth()->id() }}" class="small"><i class="fa fa-share"></i> Share your favorites list</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>All the Challenges <small></small></h1>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Filter</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form">
                            <div class="form-group">
                                <label for="search">Search by title</label>
                                <input type="text" class="form-control" id="title" value="{{ request()->get('search') }}"
                                name="search" placeholder="No guns">
                            </div>

                            <div class="form-group">
                                <label for="search">Search by game</label>
                                <select class="form-control" name="game_id">
                                    <option value="">Select a game</option>
                                    @foreach(App\Game::orderBy('title', 'asc')->get() as $game)
                                        <option value="{{ $game->id }}" {{ request()->get('game_id') == $game->id ? 'selected' : '' }}>
                                            {{ $game->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter Challenges</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                @unless(count($challenges))
                    <em>No challenges found, try broadening your search. Or <a href="{{ route('challenges.create') }}">create your own</a>.</em>
                @endunless
                @foreach($challenges as $challenge)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="text-muted pull-right">{{ $challenge->game->title}}</span>
                                <a href="{{ route('challenges.show', $challenge) }}">{{ $challenge->title }}</a>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p>
                                        Platform: {{ $challenge->platform->title }}
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <p>
                                        Difficulty: {{ $challenge->difficulty->title }}
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    Language: {{ $challenge->language->title }}
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-3">
                                    {{ $challenge->views }} views
                                </div>
                                <div class="col-xs-3">
                                    {{ $challenge->count_favorites }} favorites
                                </div>
                                <div class="col-xs-3">
                                    {{ $challenge->average_review}} review
                                </div>
                                <div class="col-xs-3 text-right">
                                    <span class="text-muted">Created on </span>
                                    {{ $challenge->created_at->toFormattedDateString() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

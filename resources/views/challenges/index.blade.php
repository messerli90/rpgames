@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="page-header">
        <h1>All the Challenges <small></small></h1>
    </div> --}}
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- RPGames Responsive -->
                    <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-0223519100876576"
                    data-ad-slot="6475713336"
                    data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="panel-footer">
                    <small><em>This ad is for beer.</em></small>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- RPGames Responsive -->
                    <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-0223519100876576"
                    data-ad-slot="6475713336"
                    data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="panel-footer">
                    <small><em>This ad is for server costs.</em></small>
                </div>
            </div>
            @unless(count($challenges))
                <em>No challenges found, try broadening your search. Or <a href="{{ route('challenges.create') }}">create your own</a>.</em>
            @endunless
            @foreach($challenges as $challenge)
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="pull-right"><a href="{{ route('challenges.index') }}?game_id={{ $challenge->game_id }}" data-toggle="tooltip" data-placement="bottom" title="Show all challenges from this game" style="color:white;">{{ $challenge->game->title}}</a></span>
                            <a href="{{ route('challenges.show', $challenge) }}">{{ $challenge->title }}</a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            You can <strong>play this on <a href="{{ route('challenges.index')}}?platform_id={{ $challenge->platform_id }}" data-toggle="tooltip" data-placement="bottom" title="Click to filter by this platform">{{ $challenge->platform->title}}</a></strong>
                            if you're feeling up to the <strong><a href="{{ route('challenges.index')}}?difficulty_id={{ $challenge->difficulty_id }}" data-toggle="tooltip" data-placement="bottom" title="Click to filter by this difficulty">{{ $challenge->difficulty->title}}</a> difficulty</strong>.
                        </p>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-8">
                                <span class="challenge-list-meta">
                                    {{ $challenge->views }} <span><i class="fa fa-fw fa-eye" data-toggle="tooltip" data-placement="bottom" title="Views"></i></span>
                                </span>
                                <span class="challenge-list-meta">
                                    {{ $challenge->count_favorites }} <span class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Favorited"><i class="fa fa-fw fa-heart"></i></span>
                                </span>
                                <span class="challenge-list-meta">
                                    {{ $challenge->average_review}} <span class="text-info" data-toggle="tooltip" data-placement="bottom" title="Reviews"><i class="fa fa-fw fa-comments"></i></span>
                                </span>
                            </div>
                            <div class="col-xs-4 text-right">
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

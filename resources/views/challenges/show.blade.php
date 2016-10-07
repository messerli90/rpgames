@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>{{ $challenge->title }} <small>by <a href="#">{{ $challenge->user->name }}</a></small></h1>
        </div>
        <div class="row">
            <div class="col-md-10">
                {{-- Description --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">How it works</h3>
                    </div>
                    <div class="panel-body">
                        @markdown($challenge->description)
                    </div>
                </div>
                {{-- /Description --}}

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

                {{-- Videos --}}
                @include('videos.show', ['challenge' => $challenge])

                {{-- Reviews --}}
                @include('reviews.show', ['challenge' => $challenge])

            </div>
            <div class="col-md-2">

                @if(!auth()->check())

                @elseif($challenge->user_id == auth()->id())
                    <a href="{{ route('challenges.edit', $challenge) }}" class="btn btn-info btn-block">Edit Challenge</a>
                    <br>
                @else
                    @if(!$favorite)
                        <form action="{{ route('favorites.store') }}" class="form" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-btn fa-heart"></i> Save Challenge</button>
                        </form>
                    @else
                        <form action="{{ route('favorites.destroy', $favorite) }}" class="form" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">
                            <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-btn fa-heart"></i> Remove Favorite</button>
                        </form>
                    @endif

                    <br>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Challenge Info</h3>
                    </div>
                    <div class="panel-body">
                        <h5>Difficulty</h5>
                        <p>{{ $challenge->difficulty->title }}</p>
                        <hr>
                        <h5>Platform</h5>
                        <p>{{ $challenge->platform->title }}</p>
                        <hr>
                        <h5>Language</h5>
                        <p>{{ $challenge->language->title }}</p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Stats</h3>
                    </div>
                    <div class="panel-body">
                        <h5>Views</h5>
                        <p>{{ $challenge->views }}</p>

                        <h5>Avg Review</h5>
                        @if($challenge->reviews()->count())
                            <p>{!! App\Review::getStars($challenge->average_review) !!}</p>
                        @else
                            <p>N/A</p>
                        @endif

                        <h5>Times Favorited</h5>
                        <p>{{ $challenge->count_favorites }}</p>
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
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(document).ready(function() {
        $('.delete-comment').click(function(e) {
            e.preventDefault();

            $(this).siblings( "form" ).submit();
        });

        $('.delete-video').click(function(e) {
            e.preventDefault();

            $(this).siblings( "form" ).submit();
        });
    });
    </script>
@endsection

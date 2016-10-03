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
                {{-- Description --}}

                .<div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Videos
                        </h3>
                    </div>
                    <div class="panel-body">
                        @unless($challenge->videos()->count())
                            <em>No videos added</em>
                        @endunless
                        @foreach($challenge->videos as $video)
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h4>{{ $video->title }}</h4>
                                    @if($video->description)
                                        @markdown($video->description)
                                    @else
                                        <p><em>No description</em></p>
                                    @endif
                                    <hr>
                                    - Added {{ $video->created_at->toFormattedDateString() }}
                                    @if(auth()->check() && auth()->user() == $challenge->user)
                                        - <a href="{{ route('videos.edit', $video) }}">Edit</a>
                                        - <a href="#" class="text-danger delete-video">Delete</a>
                                        <form class="hidden" action="{{ route('videos.destroy', $video) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    @if(auth()->check() && auth()->user() == $challenge->user)
                        <div class="panel-footer">
                            <a class="btn btn-primary btn-block" role="button" data-toggle="collapse" href="#videoForm" aria-expanded="false" aria-controls="videoForm">
                                Add a video <span class="caret"></span>
                            </a>
                            <div class="collapse" id="videoForm">
                                <hr>
                                <form class="form" action="{{ route('videos.store') }}" method="post">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">

                                    <div class="form-group">
                                        <label for="video-title" class="control-label">Title</label>
                                        <input type="text" name="title" id="video-title" value="" class="form-control" placeholder="Fallout 4 - No Guns - Survival Difficulty" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="video-title" class="control-label">URL to video <small>(Be sure to use the shortened SHARE link, not the URL in your browser.)</small></label>
                                        <input type="text" name="url" id="video-url" value="" class="form-control" placeholder="https://youtu.be/DmZJ9IYTshM" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="video-description">Description</label>
                                        <textarea class="form-control" id="video-description" name="description" placeholder="Describe your video (optional)" rows="4" cols="40"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit Video</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Reviews --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            @if($challenge->reviews()->count())
                                <span class="small pull-right">
                                    Average Review:
                                    {!! App\Review::getStars($challenge->average_review) !!}
                                </span>
                            @endif
                            Reviews
                        </h3>
                    </div>
                    <div class="panel-body">
                        @unless($challenge->reviews()->count())
                            <em>No reviews left, yet</em>
                        @endunless
                        @foreach($challenge->reviews as $review)
                            <blockquote>
                                <p>@markdown($review->body)</p>
                                <footer>
                                    {!! App\Review::getStars($review->value) !!}
                                    - {{ $review->user->name }}
                                    - {{ $review->created_at->diffForHumans() }}
                                    @if(auth()->check() && auth()->id() == $review->user_id)
                                        - <a href="{{ route('reviews.edit', $review) }}">Edit</a>
                                        - <a href="#" class="text-danger delete-comment">Delete</a>
                                        <form class="hidden" action="{{ route('reviews.destroy', $review) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    @endif
                                </footer>
                            </blockquote>
                            <hr>
                        @endforeach
                    </div>
                    @if(auth()->check())
                        <div class="panel-footer">
                            <a class="btn btn-primary btn-block" role="button" data-toggle="collapse" href="#reviewForm" aria-expanded="false" aria-controls="reviewForm">
                                Leave a Review <span class="caret"></span>
                            </a>
                            <div class="collapse" id="reviewForm">
                                <hr>
                                <form class="form" action="{{ route('reviews.store') }}" method="post">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="challenge_id" value="{{ $challenge->id }}">

                                    <div class="form-group">
                                        <label>Rate the challenge out of 5 stars</label>
                                        <select class="form-control" name="value" required>
                                            <option value="">Rate</option>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Stars</option>
                                            <option value="3">3 Stars</option>
                                            <option value="4">4 Stars</option>
                                            <option value="5">5 Stars</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="review-body">Review</label>
                                        <textarea class="form-control" id="review-body" name="body" placeholder="Write your experience playing this challenge" rows="5" cols="40" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- /Reviews --}}
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

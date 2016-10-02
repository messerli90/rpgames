@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>{{ $challenge->title }} <small>by <a href="#">{{ $challenge->user->name }}</a></small></h1>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">How it works</h3>
                    </div>
                    <div class="panel-body">
                        {{ $challenge->description}}
                    </div>
                </div>

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
                                <p>{{ $review->body }}</p>
                                <footer>
                                    {!! App\Review::getStars($review->value) !!}
                                    - {{ $review->user->name }}
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
                                <form class="form" action="#" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="value" value="">

                                    <div class="form-group">
                                        <label>Rate the challenge out of 5 stars</label>
                                        <p>
                                            <a href="#" class="star-rating" id="1-star"><i class="fa fa-star-o"></i></a>
                                            <a href="#" class="star-rating" id="1-star"><i class="fa fa-star-o"></i></a>
                                            <a href="#" class="star-rating" id="1-star"><i class="fa fa-star-o"></i></a>
                                            <a href="#" class="star-rating" id="1-star"><i class="fa fa-star-o"></i></a>
                                            <a href="#" class="star-rating" id="1-star"><i class="fa fa-star-o"></i></a>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="review-body">Review</label>
                                        <textarea class="form-control" id="review-body" name="body" placeholder="Write your experience playing this challenge" rows="5" cols="40"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-2">

                @if(!auth()->check())

                @elseif($challenge->user_id == auth()->id())
                    <a href="{{ route('challenges.edit', $challenge) }}" class="btn btn-info btn-block">Edit Challenge</a>
                    <br>
                @else
                    <a href="#" class="btn btn-success btn-block"><i class="fa fa-btn fa-heart"></i> Save Challenge</a>
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
                  </div>
                </div>

            </div>
        </div>
    </div>
@endsection

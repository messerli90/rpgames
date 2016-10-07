@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Comment</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form" action="{{ route('reviews.update', $review) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                <label class="control-label" for="value">Rate the challenge out of 5 stars</label>
                                <select class="form-control" name="value" required>
                                    <option value="">Rate</option>
                                    <option value="1" {{ $review->value == 1 ? 'selected' : '' }}>1 Star</option>
                                    <option value="2" {{ $review->value == 2 ? 'selected' : '' }}>2 Stars</option>
                                    <option value="3" {{ $review->value == 3 ? 'selected' : '' }}>3 Stars</option>
                                    <option value="4" {{ $review->value == 4 ? 'selected' : '' }}>4 Stars</option>
                                    <option value="5" {{ $review->value == 5 ? 'selected' : '' }}>5 Stars</option>
                                </select>
                                @if ($errors->has('value'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('value') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                <label class="control-label" for="review-body">Review</label>
                                <textarea class="form-control" id="review-body" name="body" placeholder="Write your experience playing this challenge" rows="5" cols="40" required min="5">{{ old('body', $review->body) }}</textarea>
                                <p class="help-block"><a href="#" data-toggle="modal" data-target="#markdownHelp">Formatting Help</a></p>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <a href="{{ route('challenges.show', $review->reviewable_id) }}" class="btn btn-default pull-right">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

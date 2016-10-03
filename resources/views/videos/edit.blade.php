@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Video</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form" action="{{ route('videos.update', $video) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="video-title" class="control-label">Title</label>
                                <input type="text" name="title" id="video-title"
                                value="{{ old('title', $video->title) }}" class="form-control" placeholder="Fallout 4 - No Guns - Survival Difficulty" required>
                            </div>

                            <div class="form-group">
                                <label for="video-title" class="control-label">URL to video <small>(Be sure to use the shortened SHARE link, not the URL in your browser.)</small></label>
                                <input type="text" name="url" id="video-url"
                                value="{{ old('url', $video->url) }}" class="form-control" placeholder="https://youtu.be/DmZJ9IYTshM" required>
                            </div>

                            <div class="form-group">
                                <label for="video-description">Description</label>
                                <textarea class="form-control" id="video-description" name="description" placeholder="Describe your video (optional)" rows="4" cols="40">{{ old('description', $video->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <a href="{{ route('challenges.show', $video->challenge) }}" class="btn btn-default pull-right">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

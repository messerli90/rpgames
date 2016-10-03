<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <small class="pull-right">
                <a data-toggle="collapse" href="#videoList" aria-expanded="false" aria-controls="videoList">Hide Videos <i class="fa fa-caret-up"></i></a>
            </small>
            Videos
        </h3>
    </div>
    <div class="panel-body collapse in" id="videoList">
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="page-header">Edit Challenge</h1>
        <form action="{{ route('challenges.update', $challenge) }}" class="form" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            placeholder="No killing run" required
                            value="{{ old('title', $challenge->title) }}">
                    </div>

                    <div class="form-group">
                        <label for="game" class="control-label">Game</label>
                        <select name="game_id" id="game" class="form-control" required>
                            <option value="">Select a game</option>
                            @foreach($games as $game)
                                <option value="{{ $game->id }}" {{ old('game_id', $challenge->game_id) == $game->id ? 'selected' : '' }}>
                                    {{ $game->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="platform" class="control-label">Platform</label>
                        <select name="platform_id" id="platform" class="form-control" required>
                            <option value="">Select a platform</option>
                            @foreach($platforms as $platform)
                                <option value="{{ $platform->id }}" {{ old('platform_id', $challenge->platform_id) == $platform->id ? 'selected' : '' }}>
                                    {{ $platform->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="difficulty" class="control-label">Difficulty</label>
                        <select name="difficulty_id" id="difficulty" class="form-control" required>
                            <option value="">Select a difficulty</option>
                            @foreach($difficulties as $difficulty)
                                <option value="{{ $difficulty->id }}" {{ old('difficulty_id', $challenge->difficulty_id) == $difficulty->id ? 'selected' : '' }}>
                                    {{ $difficulty->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="language" class="control-label">Language</label>
                        <select name="language_id" id="language" class="form-control" required>
                            <option value="">Select a language</option>
                            @foreach($languages as $language)
                                <option value="{{ $language->id }}" {{ old('language_id', $challenge->language_id) == $language->id ? 'selected' : '' }}>
                                    {{ $language->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <textarea name="description" rows="15" cols="40" placeholder="Explain your challenge"
                            required class="form-control">{{ old('description', $challenge->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
@endsection

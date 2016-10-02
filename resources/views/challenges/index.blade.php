@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
          <h1>All the Challenges <small></small></h1>
        </div>
        <div class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-9">
                @foreach($challenges as $challenge)
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="text-muted">{{ $challenge->game->title}}</span> |
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
                                {{ $challenge->average_rating}} rating
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

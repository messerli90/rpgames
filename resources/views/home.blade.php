@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{-- <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ route('challenges.create') }}" class="btn btn-primary">Create a new Challenge</a>
                </div>
            </div> --}}

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('challenges.create') }}" class="pull-right">Create a new Challenge</a>
                    Your Challenges
                </div>

                <div class="panel-body">
                    @if(!count($challenges))
                        <em>No challenges created yet.</em>
                    @else
                        <ul class="list-group">
                        @foreach($challenges as $challenge)
                            <li class="list-group-item">
                                <div class="pull-right">
                                    <span class="fa fa-fw fa-eye"></span> {{ $challenge->views }}
                                    <span class="fa fa-fw fa-star"></span> {{ $challenge->reviews()->count() }}
                                </div>
                                <a href="{{ route('challenges.show', $challenge) }}">{{ $challenge->title }}</a>
                            </li>
                        @endforeach
                        </ul>
                        {{-- <em>Thank you for contributing</em> --}}
                    @endif
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('challenges.index') }}" class="pull-right">Find more Challenges</a>
                    Saved Challenges
                </div>

                <div class="panel-body">
                    <em>No challenges saved yet.</em>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

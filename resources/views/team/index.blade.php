@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="d-flex flex-row-reverse mb-3">
                    <a href="{{ route('league.create') }}" class="btn btn-primary p-2">
                        <i class="fa fa-trash-o fa-lg"></i>
                        Create Team
                    </a>
                </div>

                @foreach($leagues as $league)
                    <div class="card mb-4">
                        <div class="card-header">{{ $league->name }} - Teams</div>
                        @if($league->season()->teams->isNotEmpty())
                            <ul class="list-group list-group-flush">
                                @foreach($league->season()->teams as $team)
                                    <li class="list-group-item">{{ $team->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <div class="card-block text-center">
                                <h4 class="card-title">Add your first Team.</h4>
                                <a href="{{ route('league.create') }}" class="btn btn-primary">Create Team</a>
                            </div>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
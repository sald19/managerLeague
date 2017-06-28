@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="d-flex flex-row-reverse mb-3">
                    <a href="{{ route('league.create') }}" class="btn btn-primary p-2">
                        <i class="fa fa-trash-o fa-lg"></i>
                        Create League
                    </a>
                </div>

                <div class="card">
                    <div class="card-header">
                        Leagues
                    </div>
                    @if(! $leagues->isEmpty())
                        <ul class="list-group list-group-flush">
                            @foreach($leagues as $league)
                                <li class="list-group-item">{{ $league->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <div class="card-block text-center">
                            <h4 class="card-title">Add your first League.</h4>
                            <a href="{{ route('league.create') }}" class="btn btn-primary">Create League</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
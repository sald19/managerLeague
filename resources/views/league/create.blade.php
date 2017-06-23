@extends('layouts.master')

@section('content')
    <form class="card card-block" method="post" action="{{  route('league.store') }}">
        <h4 class="card-title">League Settings.</h4>

        {{  csrf_field() }}

        <div class="form-group">
            <label>Name:</label>
            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Ej: Geek League"
                value="{{ $league->name or '' }}"
            >
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="league@example.com"
                value="{{ $league->email or '' }}"
            >
        </div>

        <div class="form-group">
            <label>Domain:</label>
            <div class="input-group">
                <input
                    type="text" class="form-control"
                    placeholder="league-slug" value="{{ $league->slug or '' }}"
                >
                <span class="input-group-addon">managerleague.com</span>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Save">
    </form>
@endsection
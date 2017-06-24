@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="card card-block" method="post" action="{{  route('league.store') }}">
                    <h4 class="card-title">League Settings.</h4>

                    {{  csrf_field() }}

                    <div class="form-group">
                        <label>Name:</label>
                        <input
                                type="text" name="name" value="{{ $league->name or '' }}"
                                class="form-control" placeholder="Ej: Geek League"
                        >
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input
                                type="email" name="email" value="{{ $league->email or '' }}"
                                class="form-control" placeholder="league@example.com"
                        >
                    </div>

                    <div class="form-group">
                        <label>Domain:</label>
                        <div class="input-group">
                            <input
                                    type="text" value="{{ $league->slug or '' }}"
                                    class="form-control" placeholder="league-slug"
                            >
                            <span class="input-group-addon">managerleague.com</span>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>
@endsection
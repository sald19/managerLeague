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
                        <input type="text" name="name" value="{{ $league->name or '' }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" value="{{ $league->email or '' }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Domain:</label>
                        <div class="input-group">
                            <input type="text" value="{{ $league->slug or '' }}" class="form-control">
                            <span class="input-group-addon">managerleague.com</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" name="default" class="custom-control-input"
                                {{ auth()->user()->leagues->isEmpty() ? 'checked' : '' }}
                            >
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Set this league as Default.</span>
                        </label>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>
@endsection
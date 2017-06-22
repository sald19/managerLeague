@extends('layouts.master')

@section('content')
    <form class="card card-block">
        <h4 class="card-title">League Settings.</h4>

        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Ej: Geek League">
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" placeholder="league@example.com">
        </div>

        <div class="form-group">
            <label>Domain:</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="league-slug">
                <span class="input-group-addon">managerleague.com</span>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Save">
    </form>
@endsection
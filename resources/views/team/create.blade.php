@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create Team.</div>
                    <form class="card-block" method="post" action="{{  route('team.store') }}">

                        {{  csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('firstname') ? 'has-danger' : ''}}">
                                    <label class="form-control-label">First Name:</label>
                                    <input type="text" name="firstname" class="form-control" required>
                                    @if($errors->has('firstname'))
                                        <div class="form-control-feedback">{{ $errors->first('firstname') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('lastname') ? 'has-danger' : ''}}">
                                    <label class="form-control-label">Last Name:</label>
                                    <input type="text" name="lastname" class="form-control" required>
                                    @if($errors->has('lastname'))
                                        <div class="form-control-feedback">{{ $errors->first('lastname') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('password') ? 'has-danger' : ''}}">
                                    <label class="form-control-label">Password:</label>
                                    <input type="password" name="password" class="form-control" required>
                                    @if($errors->has('password'))
                                        <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('confirm_password') ? 'has-danger' : ''}}">
                                    <label class="form-control-label">Confirm Password:</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                    @if($errors->has('confirm_password'))
                                        <div class="form-control-feedback">{{ $errors->first('confirm_password') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

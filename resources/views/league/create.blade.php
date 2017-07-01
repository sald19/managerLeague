@extends('layouts.master')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create League.</div>
                    <form class="card-block" method="post" action="{{  route('league.store') }}">
                        {{  csrf_field() }}

                        <div class="form-group {{$errors->has('name') ? 'has-danger' : ''}}">
                            <label class="form-control-label">Name:</label>
                            <input type="text" name="name" class="form-control" required>
                            @if($errors->has('name'))
                                <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-danger' : ''}}">
                            <label class="form-control-label">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                            @if($errors->has('email'))
                                <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('slug') ? 'has-danger' : ''}}">
                            <label class="form-control-label">Domain:</label>
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-addon">managerleague.com</span>
                            </div>
                            @if($errors->has('slug'))
                                <div class="form-control-feedback">{{ $errors->first('slug') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="default" class="custom-control-input"
                                        {{ !$league ? 'checked' : '' }}
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
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/flatpickr"></script>
@endpush
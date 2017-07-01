@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="d-flex flex-row-reverse mb-3">
                    <button class="btn btn-primary p-2" data-toggle="modal" data-target="#invite-team">Inivite Team</button>
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
                                <h4 class="card-title">There is nothing to show.</h4>
                                <a href="{{ route('team.create') }}" class="btn btn-primary">Invite</a>
                            </div>
                        @endif
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div id="invite-team" class="modal fade">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Invite.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">League:</label>
                        <select name='league' class="custom-select form-control">
                            @foreach($leagues as $league)
                                <option @if($league->Default) selected @endif data-slug="{{ $league->slug }}">
                                    {{ $league->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="subtmit" class="btn btn-primary">Invite</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#invite-team').on('submit', 'form', function (e) {
                e.preventDefault();
                var form = $(this);
                var email = form.find('input[name=email]').val();
                var league_id = form.find('input[name=league]').val();
                var league_slug = form.find('select[name=league] option:selected').data('slug');

                $.ajax({
                    url: '/league/' + league_slug + '/invitation',
                    method: 'post',
                    data: {
                        'email': email,
                        'league_id': league_id
                    }
                }).done(function () {
                    
                }).fail(function () {
                    
                });
            });

            console.log('test:');
        });
    </script>
@endpush
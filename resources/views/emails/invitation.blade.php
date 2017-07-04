@component('mail::message')
# Hi,

The **{{ $league->name }}** has invited you to join his league.


@component('mail::button', ['url' => route('register', ['token' => $invitation->token])])
Create Team
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

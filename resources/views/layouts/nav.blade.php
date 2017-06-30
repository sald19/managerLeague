<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img src="https://upload.wikimedia.org/wikipedia/en/b/bf/UEFA_Champions_League_logo_2.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        @if(auth()->check() && auth()->user()->league())
            {{ auth()->user()->league()->name }}
        @else
            League Name
        @endif
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('league.index') }}">
                    Leagues <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('team.index') }}">Teams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Games</a>
            </li>
        </ul>

        @if(auth()->check())
            <div>
                <img
                        src="https://avatars.io/twitter/sald19/small"
                        alt="Profile"
                        class="rounded-circle mr-3"
                        height="32px" width="32px"
                >
                <button type="button" class="btn btn-outline-danger">Logout</button>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary mr-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
        @endif
    </div>
</nav>
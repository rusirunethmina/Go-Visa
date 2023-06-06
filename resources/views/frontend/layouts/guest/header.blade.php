<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{url('/')}}">GoVisa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="navbar-nav mb-lg-0 d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('category', 'consultant') }}">Consultants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category', 'lawyer') }}">Lawyers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category', 'private') }}">Private Colleges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                </li>

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('account.dashboard') }}">My Account
                                <img style="width: 40px;" class="rounded-circle" src="{{ (auth()->user()->profile && auth()->user()->profile->avatar) ?   auth()->user()->profile->avatar :  asset('backend/images/avatar.png') }}" alt="User">
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>

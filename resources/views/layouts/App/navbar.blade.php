<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">CSListed</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Auth::check())
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <li>
                                    <button class="dropdown-item nav-link" type="submit">
                                        Logout
                                    </button>
                                </li>
                            </form>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endif
                        <li><a class="dropdown-item" href="#">Support</a></li>
                        <li><a class="dropdown-item" href="{{ route('account') }}"> My Acount</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>

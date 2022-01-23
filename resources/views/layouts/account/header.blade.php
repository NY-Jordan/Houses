<header class="header-global">
    <!--navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary">
        <div class="container position-relative">
            <a class="navbar-brand mr-lg-3" href="{{ route('account') }}">
                <img class="navbar-brand-dark" src="{{ asset('img/logo-light.png') }}" alt="menuimage">
            </a>
            <div class="navbar-collapse collapse" id="navbar-default-primary">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ route('account') }}">
                                <img src="{{ asset('img/logo-light.png') }}" alt="menuimage">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <i class="fas fa-times" data-toggle="collapse" role="button"
                                data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
                                aria-expanded="false" aria-label="Toggle navigation"></i>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto navbar-nav-hover align-items-lg-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Menu
                            <i class="fas fa-angle-down nav-link-arrow ml-2"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('account') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('account.listed') }}">Listed</a></li>
                            <li><a class="dropdown-item" href="{{ route('account.consulted') }}">Consulted</a></li>
                            <li><a class="dropdown-item" href="{{ route('account.transaction') }}">Transaction</a></li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#points" href="">My
                                    Points</a></li>
                            <li><a class="dropdown-item" href="{{ route('account.profile') }}">Profile</a></li>
                        </ul>
                    </li>
                    @include('../../components/points')
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit"> Sign out </button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse"
                    data-target="#navbar-default-primary" aria-controls="navbar-default-primary" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
</header>

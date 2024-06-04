<nav class="sb-topnav navbar navbar-expand d-flex shadow bg-light">
    <!-- Navbar Brand-->
    <a class="navbar-brand " href="{{ url('/') }}">
        <img class="img-fluid p-3" src="{{ asset('user') }}/img/logo-preview.png" alt="">
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 nav-ad-btn" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 d-flex justify-content-end w-100">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form method="post" action="{{ route('admin.logout') }}">
                        @csrf

                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">Logout</a>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
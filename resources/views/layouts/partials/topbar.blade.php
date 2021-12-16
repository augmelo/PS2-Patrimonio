<nav class="navbar navbar-expand navbar-light bg-withe topbar mb-4 static-top shadow">
    @guest
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    @endguest
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        @auth

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-black small text-right">
                    {{ auth()->user()->name }}
                </span>
            </a>
        </li>
        @else
        <li class="nav-item">
            Você ainda não se identificou
        </li>
        @endauth

    </ul>

</nav>
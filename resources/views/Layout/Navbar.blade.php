<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="font-family: Pacifico">MY - WEBSITE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto  mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('Blog') ? 'active' : '' }}" href="/Blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('About') ? 'active' : '' }}" href="/About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('Contact') ? 'active' : '' }}" href="#Contact">Contact</a>
                    </li>

                </ul>
                <ul class="navbar-nav">


                    @auth


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-center" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome , {{ Auth::user()->Nama }}<i class="bi bi-emoji-sunglasses-fill px-2"></i>
                            </a>




                            <ul class="dropdown-menu  mt-1 " aria-labelledby="navbarDropdown" style="width: 100%">
                                @can('admin')
                                    <li><a class="dropdown-item " href="/Dashboard"><i class="bi bi-menu-button-wide"
                                                style="margin-right: 25px"></i>Dashboard</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                    @endcan


                                    <form action="/Logout" method="POST">
                                        @csrf
                                        <button class="dropdown-item " type="submit"><i class="bi bi-box-arrow-right"
                                                style="margin-right: 25px"></i>Logout</button>

                                    </form>



                                </li>
                            </ul>
                        </li>
                    </ul>

                @endauth
            </div>
        </div>
    </nav>
</header>

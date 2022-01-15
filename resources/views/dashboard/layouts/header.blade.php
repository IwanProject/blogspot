<nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
    <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
        &laquo; Menu
    </button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto d-none d-lg-flex">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                    @if (auth()->user()->image)
                        <img src="{{ asset('post-image/' . auth()->user()->image) }}" alt=""
                            class="rounded-circle mr-2 profile-picture" />
                        {{ auth()->user()->username }}
                    @else
                        <img src="{{ asset('/images/user.png') }}" alt=""
                            class="rounded-circle mr-2 profile-picture" />
                        {{ auth()->user()->username }}
                    @endif
                </a>
              
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="/">
                    <span data-feather="home"></span> Home
                </a>
                <hr>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><span data-feather="log-out"></span>
                            Logout </button>
                    </form>
                </div>
            </li>

        </ul>
        <!-- Mobile Menu -->
        <ul class="navbar-nav d-block d-lg-none mt-3">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    {{ auth()->user()->name }}
                </a>
            </li>

        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GamesOR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "games") ? 'active' : '' }}" aria-current="page" href="/games">Games</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($active === "genres") ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Genres
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/genres">Action</a></li>
              <li><a class="dropdown-item" href="/genres">Adventure</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/genres">More Genres</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
          </li>
        </ul>
        <form  action="/games" class="d-flex justify-content-center" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value={{ request('search') }}>
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>

        <ul class="navbar-nav ms-auto">
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Wellcome back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-card-list"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
            @else
                <li class="nav-item">
                  <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            @endauth
        </ul>
      </div>
    </div>
  </nav>
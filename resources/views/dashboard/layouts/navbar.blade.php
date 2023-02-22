<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GamesDB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>

            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Add more Games, {{ auth()->user()->name }}
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
        </ul>
      </div>
    </div>
  </nav>
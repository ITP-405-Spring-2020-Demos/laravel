<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <header class="mt-3 mb-3">
      <h2>@yield('header')</h2>
    </header>
    <main>
      <div class="row">
        <div class="col-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          @if (Auth::check())
            <li class="nav-item">
              <a href="/profile" class="nav-link">Profile</a>
            </li>
          @else
            <li class="nav-item">
              <a href="/signup" class="nav-link">Sign Up</a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/playlists">Playlists</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/albums">Albums</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/invoices">Invoices</a>
          </li>
          @if (Auth::check())
            <li class="nav-item">
                <a href="/logout" class="nav-link">Logout</a>
            </li>
          @endif
        </ul>
        </div>
        <div class="col-9">
          @yield('content')
        </div>
      </div>
    </main>
  </div>
</body>
</html>

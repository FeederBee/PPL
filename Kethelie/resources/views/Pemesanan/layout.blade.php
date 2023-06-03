<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ke The Lie | Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

  <nav class="navbar navbar-light bg-success">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
          <img src="images/ke the lie.png" alt="Logo" width="50" height="45" />
        </a>
        <div class="btn-group dropstart dropdown">
          <button class="btn btn-success dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item " href="{{ url('/pemesanan') }}">Dafar Pemesanan</a></li>
            <li><a class="dropdown-item" href="{{ url('/historypemesanan') }}">History Pemesanan</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </div>
      </div>
    </nav>

    
  <div class="ms-4 mb-4 me-4">
    @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>


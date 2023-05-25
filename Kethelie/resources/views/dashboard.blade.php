<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ke The Lie | Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav class="navbar navbar-light bg-success">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
          <img src="images/ke the lie.png" alt="Logo" width="60" height="55" />
        </a>
        <div class="btn-group dropstart">
          <button class="btn btn-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="icons/person-circle-outline.svg" class="object-fit-cover" alt="..." width="40" height="35" />
          </button>
          <ul class="dropdown-menu bg-dark-subtle" style="top: 50px; right: -10px">
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-light bg-success fixed-bottom">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="#">
          <p style="margin: 50px"></p>
        </a>
      </div>
    </nav>

    <h1 class="position-relative mt-4 p-3 text-md-center text-success">Ke The Lie</h1>

    <div class="rounded text-center">
      <a href="{{ route('products.index') }}"><img src="images/ke the lie.jpg" class="rounded-circle me-5 border border-4 border-success" alt="Produk" width="300" /></a>
      <a href=""><img src="images/ke the lie.jpg" class="rounded-circle me-5 border border-4 border-success" alt="Maintenance" width="300" /></a>
      <a href=""><img src="images/ke the lie.jpg" class="rounded-circle me-5 border border-4 border-success" alt="Maintenance" width="300" /></a>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

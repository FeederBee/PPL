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
          @if (Auth::user()->image)
            <img src="{{ asset('storage/' .Auth::user()->image) }}" class="object-fit-cover rounded-circle border border-1 border-success" alt="Foto Profile" width="45" height="45" />
          @else
            <img src="icons/person-circle-outline.svg" class="object-fit-cover rounded-circle border border-1 border-success" alt="Foto Profile" width="45" height="45" />
          @endif
          </button>
          <ul class="dropdown-menu bg-dark-subtle" style="top: 50px; right: -10px">
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" disabled>{{ Auth::user()->nama }} | {{ Auth::user()->umur }} </a></li>
          </ul>
        </div>
      </div>
    </nav>

    <h1 class="position-relative mt-4 p-3 text-md-center text-success">Ke The Lie</h1>

    <div class="row p-3 position-relative rounded text-center">
      @if (Auth::user()-> isOwner())
      <div class="col m-4" >
        <a href="{{ route('products.index') }}"><img src="images/produk.png" class="rounded-circle  border border-4 border-success p-4" alt="Produk" width="200" /></a>
        <h4 class="text-success text-center mt-2"> Daftar Produk </h4>
      </div>
      <div class="col m-4" >
        <a href="{{ route('Bahan.index') }}"><img src="images/Bahan.png" class="rounded-circle  border border-4 border-success p-4" alt="Maintenance" width="200" /></a>
        <h4 class="text-success text-center mt-2"> Daftar Bahan Baku </h4>
      </div> 
      <div class="col m-4" >
        <a href="{{ route('owners.index') }}"><img src="images/komunitas.png" class="rounded-circle  border border-4 border-success p-4" alt="Maintenance" width="200" /></a>
        <h4 class="text-success text-center mt-2"> Komunitas </h4>
      </div>
      <div class="col m-4" >
        <a href="{{ url('/pemesanan') }}"><img src="images/orders.png" class="rounded-circle  border border-4 border-success p-4" alt="Maintenance" width="200" /></a>
        <h4 class="text-success text-center mt-2"> Daftar Pesanan </h4>
      </div>
      @else
      <div class="col m-4" ></div>
      <div class="col m-4" >
        <a href="{{ route('products.index') }}"><img src="images/produk.png" class="rounded-circle border border-4 border-success p-4" alt="Maintenance" width="200" /></a>
        <h4 class="text-success text-center mt-2"> Daftar Produk </h4>
      </div>
      <div class="col m-4" >
        <a href="{{ url('/pemesanan') }}"><img src="images/orders.png" class="rounded-circle  border border-4 border-success p-4" alt="Maintenance" width="200" /></a>
        <h4 class="text-success text-center mt-2"> Pesanan </h4>
      </div>
      <div class="col m-4" ></div>
        @endif
    </div>

    <div class="position-absolute m-2 p-2 bottom-0 end-0">
      <a href="{{ route('messages.index') }}">
        <img src="/icons/chat.png" width=50 alt="">
      </a>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

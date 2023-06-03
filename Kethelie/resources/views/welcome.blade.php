<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ke The Lie </title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
  </head>
    <body class="">     
    <nav class="navbar navbar-light bg-success">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="#">
          <img src="images/ke the lie.png" alt="Logo" width="60" height="55" />
        </a>
      </div>
    </nav>
    <nav class="navbar navbar-light bg-success fixed-bottom">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="#">
          <p style="margin: 50px"></p>
        </a>
      </div>
    </nav>     
            
        <!-- </div> -->
        <h1 class="position-relative m-4 p-3 text-md-center text-success">Selamat Datang di Ke The Lie</h1>

    <div class="position-relative border border-3 border-success m-4 p-5 mx-auto bg-light" style="width: 50%; --bs-bg-opacity: 0.5">
      <h2 class="text-success fw-semibold text-center">Silakan pilih salah satu menu di bawah untuk masuk ke Ke The Lie</h2>
      @if (Route::has('login'))
                <div class="m-4">
                    @auth
                      <div class="d-grid gap-2 col-4 mx-auto ">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-success fw-bold border-3">Back</a>
                    @else
                    <div class="d-grid gap-2 col-4 mx-auto ">
                        <a href="{{ route('login') }}" class="btn btn-outline-success fw-bold border-3">Log in</a>
                        
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-success fw-bold border-3">Register</a>
                    </div>
                        @endif
                    @endauth
                </div>
            @endif

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    </body>
</html>

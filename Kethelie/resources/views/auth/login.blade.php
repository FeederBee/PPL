<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ke The Lie | Login</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body
    style="
      background-image: url('image/ke the lie.jpg');
      background-repeat: no-repeat;
      background-position: 150px -200px;
      background-blend-mode: hard-light;
    "
  >
    <nav class="navbar navbar-light bg-success">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="{{url('/')}}">
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

    <h1 class="position-relative m-4 p-3 text-md-center text-success">Silakan Login Akun Anda!</h1>
    <form action="{{ route('login.action') }}" method="POST" class="user">
        @csrf
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
        @endif
        <div class="position-relative border border-3 border-success m-4 ps-5 pb-3 pt-5 pe-5 mx-auto bg-light" style="width: 50%; --bs-bg-opacity: 0.5">
            <form class="text-success fw-bold" action="{{ route('login.action') }}" method="POST" class="user">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif    
                <div class="row mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control border border-2 border-success" id="inputEmail" required />
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control border border-2 border-success" id="inputPassword" required />
                </div>
                <div class="d-grid gap-2 col-4 mx-auto m-2">
                    <button type="submit" class="btn btn-success">Sign in</button>
                </div>
            </form>
            <div class="d-grid gap-2 col-4 mx-auto mt-4">
                <button onclick= "window.location='{{ route('register') }}'" type="submit" class="btn btn-secondary">Registrasi</button>
            </div>
        </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
</body>
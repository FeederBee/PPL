<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ke The Lie | Owner</title>
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
          <img src="/images/ke the lie.png" alt="Logo" width="60" height="55" />
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

    <hr class="border border-success border-3 opacity-75 position-absolute" width="100%" style="top: 210px" />
    <hr class="border border-success border-3 opacity-75 position-absolute" width="50%" style="top: 260px; left: 120px" />
    <div class="vl position-absolute border border-success border-3" style="height: 40%; top: 38%; left: 120px"></div>

    
    <div class="position-absolute img-thumbnail border border-1 rounded-circle" style=" top:150px; left:90px;  ">
      @if ($user->image)
         <img src="{{ asset('storage/' .$user->image) }}" class="border border-success border-4 position-relative object-fit-cover rounded-circle" alt="Profile Image"  style="width:170px; height: 170px;">
      @else
        <img src="/images/ke the lie.jpg" class="border border-success border-4 position-relative object-fit-cover rounded-circle" alt="Profile Image"  style="width:170px; height: 170px;">
      @endif
    </div>

    <div class="position-relative ms-2 ps-3 me-2 pe-3" >
      <h4 class="position-relative" style="left: 270px; top: 155px">{{ $user->nama }}</h4>
      <a class="position-relative border border-2 border-success m-2 p-1 fs-5 text-success rounded" style="right: -30%; top: 121px" >{{ $user->status }}</a>
      <h6 class="position-relative" style="left: 230px; top: 140px">{{ $user->jenis_kelamin }} |    ({{ $user->umur }}) </h6>
      <div class="position-relative" style="top: 160px; left:120px;">
        <h6> No HP  : {{ $user->no_hp }}</h6>
        <h6> Alamat : {{ $user->alamat }}</h6>
      </div>
    </div>

    <a
      href="{{ route('owners.index')}}"
      class="position-absolute translate-middle-y btn btn-success"
      style="margin-bottom: 7%; left: 80%; bottom:0;"
    >
      < Kembali
    </a>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ke The Lie | Daftar Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-light bg-success">
    <div class="container-fluid ms-3">
      <a class="navbar-brand" href="{{ route('dashboard') }}">
        <img src="images/ke the lie.png" alt="Logo" width="60" height="55" />
      </a>
    </div>
  </nav>
  <div class="m-4">
    <div class="position-relative text-center mt-4">
     <h3 class="m-4">Daftar</h3>
    </div>
  </div>
  <div class="container text-center position-relative align-center">
    <div class="row">
    <div class="col"></div>
      <div class="col-2">
        <button id="teman" class="btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#DaftarTeman" aria-expanded="false" aria-controls="DaftarTeman" style="width:130px">
        Teman
        </button>
      </div>
      <!-- <div class="col">
        <h3 class="m-4">Daftar Owner</h3>
      </div> -->
      <div class="col-2">
        <button id="owners" class="btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#DaftarOwners" aria-expanded="false" aria-controls="DaftarOwners" style="width:130px">
        Owners
        </button>
      </div>
      <div class="col"></div>
    </div>
  </div>
  <hr>

<!-- Daftar Teman -->
@if ($listTeman->count()>0 )
<div class="collapse p-4" id="DaftarTeman">
  <div class="card card-body">
    <div class="container text-center">
      <div class="row row-cols-5">
        @foreach ($temans as $teman)
        <div class="col m-3 border border-1 border-success rounded">
          <!-- foto -->
          <div>
            @if ($teman->image)
              <img src="{{ asset('storage/' .$user->image) }}" class="img-thumbnail mt-3 mb-3 rounded-circle"  alt="foto User" style="width: 170px" />
            @else
              <img src="images/ke the lie.jpg" class="img-thumbnail  mt-3 mb-3 rounded-circle"  alt="foto User"   style="width: 170px" />

            @endif
          <div>
            <!-- Nama User -->
            <h4 class="form-label text-success text-center">{{ $teman-> nama }}</h4>
            <hr class="text-success">
          </div>
          <div class="row row-cols-2 ms-2 me-2 p-1 border border-1 border-success rounded">
            <div class="col border-end border-success">
              <!-- Jenis Kelamin User -->
              <label for="" class="form-label text-success ">{{ $teman-> jenis_kelamin }}</label>
            </div>
            <div class="col ">
              <!-- Usia -->
              <label for="" class="form-label text-success text-start">{{ $teman-> umur }}</label>
            </div>
          </div>
          <div>
            <!-- Nama User -->
            <p class="form-label fs-5 text-success text-center mt-3">{{ $teman-> no_hp }}</p>
            <!-- <hr class="text-success"> -->
          </div>
          <hr class="text-success">
          <form action="{{ route('addfriends.destroy', $teman->id) }}" class="row g-2 pe-4 ps-4 mb-2" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-success" type="submit" >- Unfriend </button>
          </form>
          <div class="row g-2 pe-4 ps-4 mb-2">

            <button class="btn btn-success" type="submit">Message </button>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endif

<!-- List Owners section -->
<div class="collapse p-4" id="DaftarOwners">
  <div class="card card-body">
    <div class="container text-center">
      <div class="row row-cols-5">
        @foreach ($userOwners as $user)
        <div class="col m-3 border border-1 border-success rounded">
          <!-- foto -->
          <div>
          @if ($user->image)
              <img src="{{ asset('storage/' .$user->image) }}" class="img-thumbnail mt-3 mb-3 rounded-circle"  alt="foto User" style="width: 170px" />
            @else
              <img src="images/ke the lie.jpg" class="img-thumbnail  mt-3 mb-3 rounded-circle"  alt="foto User"   style="width: 170px" />

            @endif
            <h4 class="form-label text-success text-center">{{ $user-> foto }}</h4>
          </div>
          <div>
            <!-- Nama User -->
            <h4 class="form-label text-success text-center">{{ $user-> nama }}</h4>
            <hr class="text-success">
          </div>
          <div class="row row-cols-2 ms-2 me-2 p-1 border border-1 border-success rounded">
            <div class="col border-end border-success">
              <!-- Jenis Kelamin User -->
              <label for="" class="form-label text-success ">{{ $user-> jenis_kelamin }}</label>
            </div>
            <div class="col ">
              <!-- Usia -->
              <label for="" class="form-label text-success text-start">{{ $user-> umur }}</label>
            </div>
          </div>
          
          <hr class="text-success">
          <form action="{{ route('addfriends.store') }}" class="row g-2 pe-4 ps-4 mb-2" method="POST">
            @csrf
            <input type="hidden" name="id_teman_user" value="{{ $user-> id }}">
            <input type="hidden" name="status" value="Friend">
            <input type="hidden" name="nama" value="{{ $user-> nama }}">
            <input type="hidden" name="umur" value="{{ $user-> umur }}">
            <input type="hidden" name="jenis_kelamin" value="{{ $user-> jenis_kelamin }}">
            <input type="hidden" name="no_hp" value="{{ $user-> no_hp }}">
            <input type="hidden" name="image" value="{{ $user-> image }}">
            <button class="btn btn-success" type="submit" >+add friend </button>
          </form>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>



<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  <script>
    var teman = document.getElementById('teman');
    var owners = document.getElementById('owners');

    teman.addEventListener('click', function() {
        if (teman.classList.contains('active')) {
            teman.classList.remove('active');
        } else {
            teman.classList.add('active');
        }
    });

    owners.addEventListener('click', function() {
        if (owners.classList.contains('active')) {
            owners.classList.remove('active');
        } else {
            owners.classList.add('active');
        }
    });

    document.addEventListener('click', function(event) {
        var target = event.target;
        if (target !== teman && !teman.contains(target)) {
            teman.classList.remove('active');
        }
        if (target !== owners && !owners.contains(target)) {
            owners.classList.remove('active');
        }
    });
  </script>
  </body>
</html>
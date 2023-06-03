<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ke The Lie | Profile</title>
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

    
    <div class="position-relative">
      @if (Auth::user()->image)
            <img src="{{ asset('storage/' .$user->image) }}" class="border border-success border-4 position-relative" alt="Profile Image"  style="margin: 70px 0 0 50px; width:200px; top: 50px">
      @else
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon border-success" viewBox="0 0 512 512" width="150" style="margin: 70px 0 0 50px">
              <path
              d="M258.9 48C141.92 46.42 46.42 141.92 48 258.9c1.56 112.19 92.91 203.54 205.1 205.1 117 1.6 212.48-93.9 210.88-210.88C462.44 140.91 371.09 49.56 258.9 48zm126.42 327.25a4 4 0 01-6.14-.32 124.27 124.27 0 00-32.35-29.59C321.37 329 289.11 320 256 320s-65.37 9-90.83 25.34a124.24 124.24 0 00-32.35 29.58 4 4 0 01-6.14.32A175.32 175.32 0 0180 259c-1.63-97.31 78.22-178.76 175.57-179S432 158.81 432 256a175.32 175.32 0 01-46.68 119.25z"
              />
              <path
              d="M256 144c-19.72 0-37.55 7.39-50.22 20.82s-19 32-17.57 51.93C191.11 256 221.52 288 256 288s64.83-32 67.79-71.24c1.48-19.74-4.8-38.14-17.68-51.82C293.39 151.44 275.59 144 256 144z"
              />
            </svg>
      @endif
    </div>

    <div class="position-relative ms-2 ps-3 me-2 pe-3" >
      <p class="position-relative" style="left: 250px; top: -15px">{{ $user->nama }}</p>
      <p class="position-relative" style="right: -80%; top: -20px" >Status : <span>{{ $user->status }}</span></p>
      <p class="position-relative" style="left: 250px; top: -55px">{{ $user->jenis_kelamin }} |    ({{ $user->umur }}) </p>
      <div class="position-relative" style="top: 20px; left:120px;">
        <p>No HP : {{ $user->no_hp }}</p>
        <p> Alamat : {{ $user->alamat }}</p>
      </div>
    </div>

    <a
      href="#exampleModalToggle"
      data-bs-target="#exampleModalToggle"
      data-bs-toggle="modal"
      class="position-absolute fixed-bottom end-0 translate-middle-y"
      style="margin-bottom: 7%; left: 87%"
    >
      Edit Akun
    </a>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-3">
          <div class="modal-body">
        <form  action="{{ route('profile.update' ) }}" enctype="multipart/form-data" method="POST" class="row g-3">
        @csrf
        @method('PUT')
              <div class="col-md-6 position-relatie" style="left:10px">
                <label for="inputEmail4" class="form-label">Nama</label>
                <input name="nama" type="text" class="form-control" value="{{ $user->nama }}" />
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" value="{{ $user->email }}"  />
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Umur</label>
                <input name="umur" type="text" class="form-control" value="{{ $user->umur }}" />
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="inputPassword4" />
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Jenis Kelamin</label>
                <input name="jenis_kelamin" type="text" class="form-control" value="{{ $user->jenis_kelamin }}" />
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Ketik Ulang Password</label>
                <input name="password_confirmation" type="password" class="form-control" id="inputPassword4" />
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">No HP</label>
                <input name="no_hp" type="text" class="form-control" value="{{ $user->no_hp }}" />
              </div>
              <div class="col-md-6">
                  <label for="formFile" class="form-label text-success text-start">Foto</label>
                  <input name="image" class="form-control border border-2 border-success @error('image')is-invalid @enderror" type="file" id="formFile" />
                    @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Alamat</label>
                <input name="alamat" type="text" class="form-control" value="{{ $user->alamat }}"  />
              </div>
              <div class="col-md-6"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger me-4" data-bs-dismiss="modal">Batal</button>
              <button class="btn btn-success" type="submit" >Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button> -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
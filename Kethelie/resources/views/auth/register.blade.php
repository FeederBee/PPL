<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ke The Lie | Register</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
  </head>
</head>

<body class="bg-gradient-primary">
<nav class="navbar navbar-light bg-success">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="{{ url('/')}}">
          <img src="images/ke the lie.png" alt="Logo" width="60" height="55" />
        </a>
      </div>
    </nav>
    <h2 class="mt-4 text-success" style="text-align: center">Silakan Mendaftar Terlebih Dahulu!</h2>
    <!-- Form untuk mengisi data user -->
    <form action="{{ route('register.save') }}" method="POST" class="user row g-3 bg-light position-absolute border border-2 border-success ps-5 mt-2 pe-5 pb-3 pt-2text-success"
            width="100px"
            style="--bs-bg-opacity: 0.6; width: 75%; left: 13%">
                @csrf
                <div class="form-group col-md-6">
                    <label class="form-label">Nama</label>
                  <input name="nama" type="text" class="form-control form-control-user @error('nama')is-invalid @enderror" id="exampleInputName" placeholder="Nama Anda">
                  @error('nama')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Email</label>
                  <input name="email" type="email" class="form-control form-control-user @error('email')is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Umur</label>
                  <input name="umur" type="text" class="form-control form-control-user @error('umur')is-invalid @enderror" id="exampleInputUmur" placeholder="Umur Anda">
                  @error('umur')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control form-control-user @error('password')is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                    @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group col-md-6">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="None"> </option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                    <div class="col-md-6">
                        <label class="form-label">Ketik Ulang Password</label>
                        <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation')is-invalid @enderror" id="exampleRepeatPassword" placeholder="Repeat Password">
                        @error('password_confirmation')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                <div class="form-group col-md-6">
                    <label class="form-label">No HP</label>
                  <input name="no_hp" type="text" class="form-control form-control-user @error('no_hp')is-invalid @enderror" id="exampleInputNoHP" placeholder="Nomor Ponsel Anda">
                  @error('no_hp')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label class="form-label" for="status">Status</label>
                  <select class="form-control" id="status" name="status" placeholder="Status">
                    <option value="Customer">Pelanggan</option>
                    <option value="Owner">Pemilik/Pengusaha</option>
                  </select>
                </div>
                
                <div class="form-group col-md-6">
                  <label class="form-label">Alamat</label>
                  <input name="alamat" type="text" class="form-control form-control-user @error('alamat')is-invalid @enderror" id="exampleInputAlamat" placeholder="Alamat Anda">
                  @error('alamat')
                  <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                
                <div class="mt-6 col-md-6 position-relative " style="height:40px; top:9px">
                    <label class="form-label">  </label>
                    <button type="submit" class="d-flex btn btn-success  justify-content-center " style="width: 50%; top: 30px">Register</button>
                </div>

                <div class="col-md-6 text-center"></div>
                <div class="col-md-6"><a class="small" href="{{ route('login') }}">Already have an account? Login!</a></div>
              </form>
              <hr>
           
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
</body>
</html>
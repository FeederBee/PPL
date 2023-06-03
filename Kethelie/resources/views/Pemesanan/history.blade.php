@extends('Pemesanan.layout')
 
@section('content')
    <div class="position-relative text-center mt-4">
          <h3 >History Pemesanan </h3>
    </div>            
    <hr>

    <!-- Menampilkan pesanan yang masih belum diapa-apain -->
    <div class="row row-cols-lg-4  p-3 border border-4 border-success">
        @if (Auth::user()->isOwner())
        @foreach ($pesanansOwner as $pesanan)
        @if ($pesanan->status =='Dikonfirmasi')
            <div id="KonfirmasiForm{{ $pesanan->id }}" class="col-sm-6 mb-4 ">
            <img src="images/ke the lie.jpg" class="card-img-top border border-2 border-success rounded-top" alt="...">
                <div class="card border border-2 border-success ">
                    <div class="card-body rounded-bottom">
                        <h5 class="card-title">Nama Produk : {{$pesanan->nama}}</h5>
                        <p class="card-text">  Jumlah order : {{$pesanan->jumlah}}</p>
                    </div>
                    
                </div>
            </div>
        @endif
        @endforeach
        @else
        @foreach ($pesanansCust as $pesanan)
        @if ($pesanan->status=='Dikonfirmasi')
            <div class="col-sm-6 mb-4 ">
                <img src="images/ke the lie.png" class="card-img-top border border-2 border-success rounded-top" alt="Anjinglah">
                <div class="card border border-2 border-success ">
                    <div class="card-body rounded-bottom">
                        <h5 class="card-title">Nama Produk : {{$pesanan->nama}}</h5>
                        <p class="card-text">  Jumlah Dipesan : {{$pesanan->jumlah}}</p>
                        <div>
                            <a class=" btn btn-primary"  data-bs-target="#ModalUlasan{{ $pesanan->id }}" data-bs-toggle="modal" >+ Ulasan</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        @endif
    </div>

    @if($pesanans->count() > 0)
    @foreach ($pesanans as $pesanan)
    <div class="modal fade" id="ModalUlasan{{ $pesanan->id }}" aria-hidden="true" aria-labelledby="ModalEditLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-success border-3">
          <div class="modal-body">
          <form id="UlasanForm{{ $pesanan->id }}" action="{{ route('ulasans.store', $pesanan->id) }}" enctype="multipart/form-data" class="row row-cols-lg-1 " method="POST">
              @csrf
                  <div class="col-md-6 text-start mt-3">
                    <label for="inputnama" class="form-label text-success" width="100">Nama Produk</label>
                    <input type="hidden" name="nama_produk" value="{{ $pesanan->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="nama_produk" placeholder="Nama Produk"/>
                    <input type="text"  value="{{ $pesanan->nama }}" class="form-control border border-2 border-success  @error('nama')is-invalid @enderror" id="inputnama" placeholder="Nama Anda" disabled style="width:100px"/>
                    @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col text-start mt-3">
                    <input type="hidden" name="id_product" value="{{ $pesanan->id_product }}" class="form-control border border-2 border-success @error('nama')is-invalid @enderror"/>
                    <input type="hidden" name="nama_pengulas" value="{{ $user->nama }}" class="form-control border border-2 border-success @error('nama')is-invalid @enderror"/>
                  </div>
                    <div class="col text-start mt-3">
                      <label for="inputStok" class="form-label text-success">Ulasan Anda</label>
                      <textarea rows="4" cols="50" name="ulasan" class="form-control border border-2 border-success  @error('stok')is-invalid @enderror" id="ulasan"></textarea>
                      @error('stok')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
          
              <div class="modal-footer">
                <a class="btn btn-danger" data-bs-dismiss="modal">Batal</a>
                <button class="btn btn-success" type="submit">Kirim</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    @endforeach
    @endif

@endsection